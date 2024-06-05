@extends('admin.template.master')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ubah Data Supplier</h4>
                        <a href="{{ route('supplier.index') }}" type="button" class="btn btn-success mb-3">Kembali</a>
                        <div>
                            <form action="{{ route('supplier.update', $data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                    <div class="form-group">
                                        <label for="">Nama Supplier</label>
                                        <input type="text" value="{{ $data->name }}" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" value="{{ $data->alamat }}" name="alamat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <input type="text" value="{{ $data->keterangan }}" name="keterangan" class="form-control">
                                    </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-warning">Update</button>
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
