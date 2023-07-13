<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product PDF</title>
    <style>

        body{
            font-family: DejaVu Sans;
        }

        .page-break {
            page-break-after: always;
        }

        table {
        border-collapse: collapse;
        width: 100%;       
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
        background-color: #04AA6D;
        color: white;
        }

        h1{
            text-align: center;
        }
     
        </style>
</head>
<body>
    <h1>MENU</h1>
    <table class="customers">
        <tr>
            <th>STT</th>
            <th>Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Gía</th>
            <th>Đơn Vị Tính</th>
        </tr>
        @foreach ($products as  $key => $product)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $product->TenSP }}</td>
                <td> {{ $product->TenDMSP }} </td>
                <td>{{ $product->Gia }}</td>
                <td>{{ $product->DonViTinh }}</td>
            </tr>  
        @endforeach    
    </table>

</body>
</html>