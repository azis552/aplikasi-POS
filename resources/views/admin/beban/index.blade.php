

@extends('admin.template.master')
@section('content')
    <!-- partial -->
   <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Beban</h4>
                <a href="{{ route('beban.create') }}" type="button" class="btn btn-success">Tambah beban</a>
                </p>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Nama </th>
                        <th> Nominal</th>
                        <th> Jenis</th>
                        <th> Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bebans as $beban)
                      <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $beban->name }} </td>
                        <td> {{ $beban->nominal }} </td>
                        <td> {{ $beban->Jenis }} </td>
                        <td> 
                            <form action="{{ route('beban.destroy',$beban->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('beban.edit',$beban->id) }}" class="btn btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>     
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-end mt-4">
                    {{ $bebans->links() }}
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
   
 