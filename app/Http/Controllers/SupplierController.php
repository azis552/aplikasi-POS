<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('created_at','DESC')->paginate(10); // Menampilkan 10 data per halaman
        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required'
        ]);

        $simpan = Supplier::create($validation);
        return redirect('supplier');
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
        $data = Supplier::findOrFail($id);
        return view('admin.supplier.edit',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Supplier::findOrFail($id);

        $validasi = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required'
        ]);

        $data->update($validasi);
        return redirect('supplier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Supplier::findOrFail($id);


        $data->delete();
        return redirect('supplier');
    }
}
