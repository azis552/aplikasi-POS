<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Product::join('suppliers', 'products.id_supplier', '=', 'suppliers.id')
                  ->select('products.*', 'suppliers.name as supplier_name')
                  ->orderBy('products.created_at', 'DESC')
                  ->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();
        return view('admin.produk.create',['supplier'=> $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_supplier' => 'required',
            'name' => 'required',
            'jenis' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'profit' => 'required',
        ]);

        $simpan = Product::create($validate);
        return redirect('produk');
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
        $supplier= Supplier::all();
        $data = Product::findOrFail($id);
        return view('admin.produk.edit',['data'=> $data, 'supplier'=> $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'id_supplier' => 'required',
            'name' => 'required',
            'jenis' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'profit' => 'required',
        ]);
        $data = Product::findOrFail($id);
        $data->update($validate);
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::findOrFail($id);


        $data->delete();
        return redirect('produk');
    }
}
