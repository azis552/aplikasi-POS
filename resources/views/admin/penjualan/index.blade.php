@extends('admin.template.master')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Penjualan</h4>
                        
                        </p>
                        <style>
                            .dropbtn {
                                background-color: #04AA6D;
                                color: white;
                                padding: 5px;
                                font-size: 12px;
                                border: none;
                                cursor: pointer;
                                border-radius: 5%;
                                margin-bottom: 3%;
                            }

                            .dropbtn:hover,
                            .dropbtn:focus {
                                background-color: #3e8e41;
                            }

                            #myInput {
                                box-sizing: border-box;
                                background-image: url('searchicon.png');
                                background-position: 14px 12px;
                                background-repeat: no-repeat;
                                font-size: 16px;
                                padding: 14px 20px 12px 45px;
                                border: none;
                                border-bottom: 1px solid #ddd;
                            }

                            #myInput:focus {
                                outline: 3px solid #ddd;
                            }

                            .dropdown {
                                position: relative;
                                display: inline-block;
                            }

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: #f6f6f6;
                                min-width: 230px;
                                overflow: auto;
                                border: 1px solid #ddd;
                                z-index: 1;
                            }

                            .dropdown-content a {
                                color: black;
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                            }

                            .dropdown a:hover {
                                background-color: #ddd;
                            }

                            .show {
                                display: block;
                            }
                        </style>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('penjualan.batal_session','coba') }}" class="btn btn-danger">Batal</a>
                            </div>
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">Tambah Barang</button>
                                
                                <div id="myDropdown" class="dropdown-content">
                                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                    @foreach ($produk as $i)
                                    <a href="{{ route('penjualan_sementara',$i->id) }}" class="produk" data-value="{{ $i->id }}">{{ $i->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Produk </th>
                                        <th> Harga </th>
                                        <th> Jumlah</th>
                                        <th> Diskon </th>
                                        <th> Harga Akhir</th>
                                        <th> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    @php
                                        $no =1;
                                    @endphp
                                    @foreach ($penjualan as $i)
                                    <tr>
                                        <form action="{{ route('penjualan.store') }}" method="post">
                                            @csrf
                                        <td>{{ $no++ }}</td>
                                        <td> {{ $i->product_name }} </td>
                                        <td> {{ $i->products_harga }} </td>
                                        <input type="hidden" name="id" value="{{ $i->id }}">
                                        <input type="hidden" name="harga" value="{{ $i->products_harga }}">
                                        <td> <input type="text" class="form-control" name="jumlah" required value="{{ $i->jumlah_beli }}"> </td>
                                        <td> <input type="text" class="form-control" name="diskon" required value="0"> </td>
                                        <td> {{ $i->harga_terjual }} </td>
                                        <td> 
                                            <button type="submit" class="btn btn-warning"> Update </button>
                                            <a href="{{ route('penjualan.hapus_list',$i->id) }}" type="button" class="btn btn-danger"> Delete </a>

                                         </td>
                                        </form>
                                    </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>

                            <form action="{{ route('penjualan.simpan') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="">Total Tagihan</label>
                                        <input type="text" class="form-control" name="total" value="{{ @$total }}" style="color: black" readonly>
                                        <label for="">Jumlah Bayar</label>
                                        <input type="text" class="form-control" name="jumlah_bayar">
                                        <label for="">Jenis Pembayaran</label>
                                        <select name="pembayaran" id="" class="form-control" style="color: wheat">
                                            <option value="">Pilih Pembeayaran</option>
                                            <option value="CASH">CASH</option>
                                            <option value="Transfer BNI">Transfer BNI</option>
                                            <option value="Transfer BCA">Transfer BCA</option>
                                            <option value="Transfer BRI">Transfer BRI</option>
                                            <option value="Transfer BTN">Transfer BTN</option>
                                            <option value="Transfer MANDIRI">Transfer MANDIRI</option>
                                            <option value="Transfer PERMATA">Transfer PERMATA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
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
