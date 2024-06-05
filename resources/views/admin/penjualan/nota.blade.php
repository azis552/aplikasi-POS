<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .text-end {
            text-align: end;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr>
                <td colspan="4" class="text-center">
                    <h2>Nota Pembayaran</h2>
                </td>
            </tr>
            <tr class="heading">
                <td>No Transksi</td>
                <td>{{ str_replace(['-', ' ', ':'], '', $penjualan->created_at->format('YmdHis')) }}</td>
                <td>Tanggal</td>
                <td>{{ $penjualan->tanggal }}</td>
            </tr>
            <tr class="heading">
                <td>Nama</td>
                <td>QTY</td>
                <td>Diskon</td>
                <td>Harga</td>
            </tr>
            @foreach ($detail_penjualan as $i)
            <tr class="item">
                <td>{{ $i->product_name }}</td>
                <td class="text-center">{{ $i->jumlah_beli }}</td>
                <td class="text-center">{{ $i->diskon }}</td>
                <td class="text-end">{{ $i->harga_terjual }}</td>
            </tr>
            @endforeach
            <tr class="total">
                <td colspan="3" class="text-end">Total Tagihan</td>
                <td class="text-end">{{ $penjualan->total }}</td>
            </tr>
            <tr class="total">
                <td colspan="3" class="text-end">Total Bayar</td>
                <td class="text-end">{{ $penjualan->jumlah_bayar }}</td>
            </tr>
            <tr class="total">
                <td colspan="3" class="text-end">Metode Bayar</td>
                <td class="text-end">{{ $penjualan->id_pembayaran }}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">Terima Kasih Kunjungannya</td>
            </tr>
        </table>
    </div>
</body>
</html>
