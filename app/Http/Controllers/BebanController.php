<?php

namespace App\Http\Controllers;

use App\Models\Beban;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;

class BebanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bebans = Beban::orderBy('created_at', 'DESC')->paginate(10); // Menampilkan 10 data per halaman
        return view('admin.beban.index', compact('bebans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.beban.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required',
            'nominal' => 'required',
            'jenis' => 'required',
            'tanggal' => 'required',
        ]);

        $simpan = Beban::create($validasi);
        return redirect('beban');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function labarugi()
    {
        return view('admin.laporan.index');
    }
    public function cetak_lr(Request $request)
    {
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_akhir = $request->input('tanggal_akhir');

        $detail_penjualan = PenjualanDetail::join('products', 'penjualan_details.id_produk', '=', 'products.id')
            ->select('penjualan_details.*', 'products.name as product_name', 'products.harga_jual as products_harga')
            ->orderBy('penjualan_details.created_at', 'DESC')
            ->whereBetween('penjualan_details.created_at', [$tanggal_mulai, $tanggal_akhir])
            ->where('id_penjualan', '!=', '')
            ->get();
        // Menjumlahkan kolom products_harga


        // Menjumlahkan kolom penjualan_details.total
        $pendapatan = $detail_penjualan->sum('harga_terjual');

        $beban_bhp = $detail_penjualan->sum('products_harga');

        $beban_operasional = Beban::where('Jenis', 'beban operasional')
            ->whereBetween('tanggal', [$tanggal_mulai, $tanggal_akhir])
            ->get();
        $beban_administrasi = Beban::where('Jenis', 'beban administrasi')
            ->whereBetween('tanggal', [$tanggal_mulai, $tanggal_akhir])
            ->get();
        $beban_lainnya = Beban::where('Jenis','=', 'beban lainnya')
            ->whereBetween('tanggal', [$tanggal_mulai, $tanggal_akhir])
            ->get();
        $total_operasional = $beban_operasional->sum('nominal');
        $total_administrasi = $beban_administrasi->sum('nominal');
        $total_lainnya = $beban_lainnya->sum('nominal');
        $total_beban = $beban_bhp+$total_administrasi+$total_operasional+$total_lainnya;
        $lr = $pendapatan-$total_beban;
        return view('admin.laporan.cetak_lr',[
            'pendapatan' => $pendapatan,
            'beban_bhp' => $beban_bhp,
            'total_beban' => $total_beban,
            'total_administrasi' => $total_administrasi,
            'total_operasional' => $total_operasional,
            'total_lainnya' => $total_lainnya,
            'lr' => $lr,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_akhir' => $tanggal_akhir,
        ]);
    }
}
