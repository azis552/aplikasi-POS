

@extends('admin.template.master')
@section('content')
    <!-- partial -->
   <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tambah Pembelian</h4>
                <a href="{{ route('pembelian.index') }}" type="button" class="btn btn-success mb-3">Kembali</a>
                <div>
                    <form action="{{ route('pembelian.store') }}" method="post">
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
                            <select name="id_product" id="" class="form-control" required style="color: wheat">
                                <option value="">Pilih Product</option>
                                @foreach ($product as $i)
                                    <option value="{{$i->id}}"> {{ $i->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Pemesanan</label>
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Diterima</label>
                                    <input type="date" name="tanggal_diterima" class="form-control">
                                </div>
                            </div>
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
   
 