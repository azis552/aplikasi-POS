@extends('admin.template.master')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Penjualan Total</h4>
                        <a href="{{ route('penjualan.index') }}" type="button" class="btn btn-success">Tambah pembelian</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Id Transaksi </th>
                                        <th> Tanggal </th>
                                        <th> Total  </th>
                                        <th> Pembayaran </th>
                                        <th> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no =1;
                                    @endphp
                                    @foreach ($penjualan as $i)
                                    <tr>
                                        
                                            @csrf
                                        <td>{{ $no++ }}</td>
                                        <td> {{ str_replace(['-', ' ', ':'], '', $i->created_at->format('YmdHis')) }} </td>
                                        <td> {{ $i->tanggal }} </td>
                                        <td> {{ $i->total }} </td>
                                        <td> {{ $i->id_pembayaran }} </td>
                                        <td> 
                                            <a href="{{ route('nota.cetak',$i->id) }}" type="button" class="btn btn-success">Nota</a>
                                        </td>
                                        
                                        
                                    </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-4">
                                {{ $penjualan->links() }}
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
