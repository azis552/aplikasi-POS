<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::join('suppliers', 'pembelians.id_supplier', '=', 'suppliers.id')
                  ->join('products','pembelians.id_product','=','products.id')
                  ->select('pembelians.*', 'suppliers.name as supplier_name', 'products.name as product_name')
                  ->orderBy('pembelians.created_at', 'DESC')
                  ->paginate(10);
        return view('admin.pembelian.index',['pembelians' => $pembelian]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();
        $product = Product::all();
        return view('admin.pembelian.create',['supplier'=> $supplier,'product'=> $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'tanggal' => 'required',
            'id_supplier' => 'required',
            'id_product' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'tanggal_diterima' => 'required',
        ]);
        $produk = Product::findOrFail($request->input('id_product'));
        $stoklama = ($produk->stok);
        $stokbaru =  $request->input('jumlah');
        $stok = $stokbaru+$stoklama;
        $stokbaru = ['stok'=> $stok];
        $produk->update($stokbaru);
        $simpan = Pembelian::create($validate);
        return redirect('pembelian');
        
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
}
