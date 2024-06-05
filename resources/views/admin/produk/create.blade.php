

@extends('admin.template.master')
@section('content')
    <!-- partial -->
   <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tambah Data produk</h4>
                <a href="{{ route('produk.index') }}" type="button" class="btn btn-success mb-3">Kembali</a>
                <div>
                    <form action="{{ route('produk.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Supplier</label>
                            <select name="id_supplier" id="" class="form-control" required style="color: wheat">
                                <option value="">Pilih Supplier</option>
                                @foreach ($supplier as $i)
                                    <option value="{{$i->id}}"> {{ $i->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Product</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <input type="text" name="jenis" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="number" name="stok" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Beli</label>
                            <input type="number" name="harga_beli" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Jual</label>
                            <input type="number" name="harga_jual" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Profit</label>
                            <input type="number" name="profit" class="form-control">
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                          </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
       </div>
       <!-- content-wrapper ends -->
       <!-- partial:partials/_footer.html -->
       <footer class="footer">
         <div class="d-sm-flex justify-content-center justify-content-sm-between">
           <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Diva 2024</span>
           
         </div>
       </footer>
       <!-- partial -->
     </div>
     <!-- main-panel ends -->
@endsection
   
 