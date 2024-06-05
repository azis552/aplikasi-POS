@extends('admin.template.master')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data pembelian</h4>
                        <a href="{{ route('pembelian.create') }}" type="button" class="btn btn-success">Tambah pembelian</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Supplier </th>
                                        <th> Product </th>
                                        <th> Jumlah</th>
                                        <th> Harga</th>
                                        <th> Tanggal Pembelian</th>
                                        <th> Tanggal Diterima</th>
                                        <th> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembelians as $pembelian)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{ $pembelian->supplier_name }} </td>
                                            <td> {{ $pembelian->product_name }} </td>
                                            <td> {{ $pembelian->jumlah }} </td>
                                            <td> {{ $pembelian->harga }} </td>
                                            <td> {{ $pembelian->tanggal }} </td>
                                            <td> {{ $pembelian->tanggal_diterima }} </td>
                                            <td>

                                                <a href="{{ route('pembelian.edit', $pembelian->id) }}"
                                                    class="btn btn-warning">Cetak Bukti</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-4">
                                {{ $pembelians->links() }}
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
