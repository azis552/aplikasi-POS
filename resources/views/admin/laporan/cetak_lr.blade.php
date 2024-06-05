<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Laba / Rugi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        td {
            text-align: right;
        }
        td[colspan="3"] {
            text-align: left;
            font-weight: bold;
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .periode {
            text-align: center;
            margin-bottom: 20px;
        }
        .total {
            font-weight: bold;
            background-color: #f2f2f2;
        }
        
        /* Styling for print */
        @media print {
            body {
                margin: 0;
                font-size: 12px;
            }
            table {
                margin: 0;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #000;
                padding: 4px;
            }
            .title {
                font-size: 18px;
                margin-bottom: 10px;
            }
            .periode {
                margin-bottom: 10px;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
</head>
<body>
    <div class="title">Laporan Laba / Rugi</div>
    <div class="periode">Periode {{ $tanggal_mulai }} - {{ $tanggal_akhir }}</div>
    <table>
        <tr>
            <td colspan="3">Pendapatan</td>
        </tr>
        <tr>
            <td>Pendapatan</td>
            <td>:</td>
            <td>{{ $pendapatan }}</td>
        </tr>
        <tr class="total">
            <td>Total Pendapatan</td>
            <td>:</td>
            <td>{{ $pendapatan }}</td>
        </tr>
        <tr>
            <td colspan="3">Beban</td>
        </tr>
        <tr>
            <td>Beban Administrasi</td>
            <td>:</td>
            <td>{{ $total_administrasi }}</td>
        </tr>
        <tr>
            <td>Beban Operasional</td>
            <td>:</td>
            <td>{{ $total_operasional }}</td>
        </tr>
        <tr>
            <td>Beban Lainnya</td>
            <td>:</td>
            <td>{{ $total_lainnya }}</td>
        </tr>
        <tr class="total">
            <td>Total Beban</td>
            <td>:</td>
            <td>{{ $total_beban }}</td>
        </tr>
        <tr class="total">
            <td>Laba / Rugi</td>
            <td>:</td>
            <td>{{ $lr }}</td>
        </tr>
    </table>
</body>
</html>
