

@extends('admin.template.master')
@section('content')
    <!-- partial -->
   <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tambah Data beban</h4>
                <a href="{{ route('beban.index') }}" type="button" class="btn btn-success mb-3">Kembali</a>
                <div>
                    <form action="{{ route('beban.update',$data->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama beban</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nominal</label>
                            <input type="text" name="nominal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Beban</label>
                            <select name="jenis" id="" class="form-control">
                              <option value="">Pilih Jenis</option>
                              <option value="Beban Operasional">Beban Operasional</option>
                              <option value="Beban Administasi">Beban Administasi</option>
                              <option value="Beban Lainnya">Beban Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="">Tanggal</label>
                          <input type="date" name="tanggal" class="form-control">
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
   
 