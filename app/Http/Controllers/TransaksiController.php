<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\member;
use App\Models\paket;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class TransaksiController extends Controller
{
    protected $judul = 'Transaksi';
    protected $menu = 'transaksi';
    protected $sub_menu = '';
    protected $directoryAdmin = 'admin.transaksi';

    public function main()
    {
        return view($this->directoryAdmin . ".main", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'transaksi' => transaksi::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        return view($this->directoryAdmin . ".add", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'paket' => paket::all(),
            'member' => member::all(),
        ]);
    }

    public function store(Request $request)
    {


        DB::beginTransaction();

        try {

            $validatedDataTransaksi = $request->validate([
                'id_member' => 'required',
                'tgl' => 'required',
                'batas_waktu' => 'required',
            ]);

            //kode invoice
            $validatedDataTransaksi['kode_invoice'] = "INV-" . Carbon::createFromFormat('Y-m-d', $request->tgl)->toDateString();

            // id
            $validatedDataTransaksi['id_outlet'] = paket::where('id', $request->id_paket)->first()->id_outlet;
            $validatedDataTransaksi['id_user'] = Auth::id();

            // tanggal_bayar
            $validatedDataTransaksi['tgl_bayar'] = $request->batas_waktu;

            // perhitungan pembayaran
            $validatedDataTransaksi['total_harga'] = 0;
            $validatedDataTransaksi['pajak'] = 0;

            if (!empty($request->diskon) && $request->diskon != 0) {

                $request->validate([
                    'diskon' => 'required|numeric',
                ]);

                $validatedDataTransaksi['diskon'] = intval($request->diskon) / 100;
            } else {

                $validatedDataTransaksi['diskon'] = 0;
            }

            // status
            $validatedDataTransaksi['status'] = 'baru';
            $validatedDataTransaksi['dibayar'] = 'belum_dibayar';

            transaksi::create($validatedDataTransaksi);


            // dijalankan jika sudah selesai terinsert ke tabel transaksi
            $transaksi = transaksi::orderBy('id', 'DESC')->first();

            $validatedDataDetailTransaksi = $request->validate([
                'id_paket' => 'required',
                'qty' => 'required',
            ]);

            $validatedDataDetailTransaksi['id_transaksi'] = $transaksi->id;
            $validatedDataDetailTransaksi['keterangan'] = '-';

            detail_transaksi::create($validatedDataDetailTransaksi);


            // Dijalankan jika data sudah diinput pada tabel detail transaksi
            DB::select('CALL getTotalHarga(?,?,?,?)', array($request->qty, $request->id_paket, $transaksi->diskon, $transaksi->id));

            DB::commit();

            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'berhasil menambahkan data');
        } catch (Throwable $th) {

            DB::rollBack();

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function show($id)
    {

        $transaksi = transaksi::with('detail_transaksi')->where('id', $id)->first();

        return view($this->directoryAdmin . ".show", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'paket' => paket::all(),
            'member' => member::all(),
            'transaksi' => $transaksi,
            'tgl' => Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->tgl)->format('Y-m-d'),
            'batas_waktu' => Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->batas_waktu)->format('Y-m-d'),
        ]);
    }

    public function preBayar($id)
    {

        return view($this->directoryAdmin . ".bayar", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'transaksi' => transaksi::where('id', $id)->first(),
        ]);
    }

    public function postBayar(Request $request)
    {


        try {

            $transaksi = transaksi::where('id', $request->id)->first();

            if (!empty($request->keterangan)) {

                $request->validate([
                    'keterangan' => 'required',
                ]);
            }

            $validatedDataTransaksi['tgl_bayar'] = Carbon::now()->format("Y-m-d");

            $validatedDataTransaksi['dibayar'] = 'dibayar';
            $validatedDataTransaksi['status'] = 'diambil';

            $transaksi->update($validatedDataTransaksi);

            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'berhasil melakukan pembayaran');
        } catch (Throwable $th) {

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function prosesTransaksi($id)
    {

        try {

            $transaksi = transaksi::where('id', $id)->first();

            $validatedDataTransaksi['status'] = 'proses';

            $transaksi->update($validatedDataTransaksi);

            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'berhasil memproses transaksi');
        } catch (Throwable $th) {

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function selesaiTransaksi($id)
    {

        try {

            $transaksi = transaksi::where('id', $id)->first();

            $validatedDataTransaksi['status'] = 'selesai';

            $transaksi->update($validatedDataTransaksi);

            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'berhasil menyelesaikan transaksi');
        } catch (Throwable $th) {

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
