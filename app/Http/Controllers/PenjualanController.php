<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        @$combinedRandom = Session::get('combinedRandom');
        if (Session::get('combinedRandom') == null) {
            $penjualan = PenjualanDetail::join('products', 'penjualan_details.id_produk', '=', 'products.id')
                ->select('penjualan_details.*', 'products.name as product_name', 'products.harga_jual as products_harga')
                ->orderBy('penjualan_details.created_at', 'DESC')
                ->where('sesi', '=', 'azis')->get();
            $produk = Product::orderBy('created_at', 'DESC')->get();
            return view('admin.penjualan.index', ['penjualan' => $penjualan, 'produk' => $produk]);
        } else {
            $penjualan = PenjualanDetail::join('products', 'penjualan_details.id_produk', '=', 'products.id')
                ->select('penjualan_details.*', 'products.name as product_name', 'products.harga_jual as products_harga')
                ->orderBy('penjualan_details.created_at', 'DESC')
                ->where('sesi', '=', $combinedRandom)->get();
            $total = PenjualanDetail::where('sesi', $combinedRandom)->sum('harga_terjual');
            $produk = Product::orderBy('created_at', 'DESC')->get();
            return view('admin.penjualan.index', ['penjualan' => $penjualan, 'produk' => $produk, 'total' => $total]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = PenjualanDetail::findOrFail($request->input('id'));
        $harga_terjual = $request->input('harga') * $request->input('jumlah');
        $diskon = ($request->input('diskon') / 100) * $harga_terjual;
        $harga_terjual = $harga_terjual - $diskon;
        $perubahan = ['jumlah_beli' => $request->input('jumlah'), 'diskon' => $request->input('diskon'), 'harga_terjual' => $harga_terjual];
        $data->update($perubahan);
        return $this->index();
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

    public function tambah_penjualan_sementara($id)
    {
        $produk = Product::findOrFail($id);
        if (Session::get('combinedRandom') == null) {
            // Generate random number
            $randomNumber = rand(1000, 9999); // Angka acak antara 1000 dan 9999
            // Generate random string
            $randomString = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'); // String acak
            // Gabungkan angka dan string acak
            $combinedRandom = $randomNumber . $randomString;
            // Simpan dalam sesi
            Session::put('combinedRandom', $combinedRandom);
            // // Untuk mendapatkan nilai sesi kemudian
            // $storedCombinedRandom = Session::get('combinedRandom');
        } else {
            $combinedRandom = Session::get('combinedRandom');
        }
        $detail_penjualan = [
            'id_produk' => $produk->id,
            'diskon' => '',
            'jumlah_beli' => '1',
            'harga_terjual' => $produk->harga_jual * 1,
            'sesi' => $combinedRandom
        ];
        $penjualan_produk = PenjualanDetail::where('id_produk', '=', $id)->where('sesi', '=', $combinedRandom)->get();
        if ($penjualan_produk->isEmpty()) {
            $id_produk_penjualan = "azis";
        } else {
            foreach ($penjualan_produk as $i) {
                $id_produk_penjualan = $i->id_produk;
            }
        }
        if ($id != @$id_produk_penjualan) {
            PenjualanDetail::create($detail_penjualan);
        }
        $penjualan = PenjualanDetail::join('products', 'penjualan_details.id_produk', '=', 'products.id')
            ->select('penjualan_details.*', 'products.name as product_name', 'products.harga_jual as products_harga')
            ->orderBy('penjualan_details.created_at', 'DESC')
            ->where('sesi', '=', $combinedRandom)->get();
        $total = PenjualanDetail::where('sesi', $combinedRandom)->sum('harga_terjual');
        $produk = Product::orderBy('created_at', 'DESC')->get();
        return view('admin.penjualan.index', ['penjualan' => $penjualan, 'produk' => $produk, 'total' => $total]);
    }
    public function hapus_list($id)
    {
        $data = PenjualanDetail::findOrFail($id);
        $data->delete();
        return $this->index();
    }
    public function batal_session($id)
    {
        Session::forget('combinedRandom');

        // Cek apakah sesi sudah dihapus
        if (!Session::has('combinedRandom')) {
            $penjualan = PenjualanDetail::join('products', 'penjualan_details.id_produk', '=', 'products.id')
                ->select('penjualan_details.*', 'products.name as product_name', 'products.harga_jual as products_harga')
                ->orderBy('penjualan_details.created_at', 'DESC')
                ->where('sesi', '=', 'azis')->get();
            $produk = Product::orderBy('created_at', 'DESC')->get();
            return view('admin.penjualan.index', ['penjualan' => $penjualan, 'produk' => $produk]);
        } else {
            echo "Sesi masih ada.";
        }
    }
    public function simpan(Request $request)
    {
        $simpan_penjualan = Penjualan::create([
            'tanggal' => Carbon::now(),
            'total' => $request->input('total'),
            'jumlah_bayar' => $request->input('jumlah_bayar'),
            'id_pembayaran' => $request->input('pembayaran')
        ]);
        // Mendapatkan ID dari entri yang baru disimpan
        $penjualanId = $simpan_penjualan->id;

        // Menggunakan sesi untuk mendapatkan nilai 'combinedRandom'
        $combinedRandom = Session::get('combinedRandom');

        // Mengupdate PenjualanDetail berdasarkan nilai sesi
        PenjualanDetail::where('sesi', '=', $combinedRandom)
            ->update(['id_penjualan' => $penjualanId]);
        return $this->batal_session('coba');
    }
    public function transaksi()
    {     
        $penjualan = PenjualanDetail::join('products', 'penjualan_details.id_produk', '=', 'products.id')
        ->select('penjualan_details.*', 'products.name as product_name', 'products.harga_jual as products_harga')
        ->orderBy('penjualan_details.created_at', 'DESC')
        ->where('id_penjualan', '!=', '')->paginate(10); 
        return view('admin.penjualan.transaksi',['penjualan'=>$penjualan]);
    }
    public function data_transaksi()
    {
        $penjualan = Penjualan::paginate(10);
        return view('admin.penjualan.data',['penjualan'=>$penjualan]);
    }
    public function nota($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $detail_penjualan = PenjualanDetail::join('products', 'penjualan_details.id_produk', '=', 'products.id')
        ->select('penjualan_details.*', 'products.name as product_name', 'products.harga_jual as products_harga')
        ->orderBy('penjualan_details.created_at', 'DESC')
        ->where('id_penjualan', '=', $id)->get(); 
        return view('admin.penjualan.nota',['penjualan'=> $penjualan, 'detail_penjualan'=>$detail_penjualan]);
    }
}
