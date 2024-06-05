@extends('admin.template.master')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">LABA RUGI</h4>
                        </p>
                            <form action="{{route('cetak_lr')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="">Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai" required class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date" name="tanggal_akhir" required class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mt-4">Cetak Laporan L/R</button>
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
