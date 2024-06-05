

@extends('admin.template.master')
@section('content')
    <!-- partial -->
   <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Produk</h4>
                <a href="{{ route('produk.create') }}" type="button" class="btn btn-success">Tambah produk</a>
                </p>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Supplier </th>
                        <th> Name </th>
                        <th> Jenis</th>
                        <th> Stok</th>
                        <th> Harga Beli</th>
                        <th> Harga Jual</th>
                        <th> Profit</th>
                        <th> Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($produks as $produk)
                      <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $produk->supplier_name }} </td>
                        <td> {{ $produk->name }} </td>
                        <td> {{ $produk->jenis }} </td>
                        <td> {{ $produk->stok }} </td>
                        <td> {{ $produk->harga_beli }} </td>
                        <td> {{ $produk->harga_jual }} </td>
                        <td> {{ $produk->profit }} </td>
                        <td> 
                            <form action="{{ route('produk.destroy',$produk->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('produk.edit',$produk->id) }}" class="btn btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>     
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-end mt-4">
                    {{ $produks->links() }}
                  </div>
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
   
 