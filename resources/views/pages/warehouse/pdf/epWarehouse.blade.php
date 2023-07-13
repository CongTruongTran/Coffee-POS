<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>warehouse PDF</title>
    <style>

        body{
            font-family: DejaVu Sans;
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
    <h1>KHO HÀNG</h1>
    <table class="customers">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Số Lượng Còn</th>
            <th>Đơn Vị Tính</th>
            <th>Nhà Cung Cấp</th>
            <th>Ngày Cập Nhật</th>
        </tr>
        @foreach ($allWarehouse as  $key => $warehouse)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $warehouse->TenHang }}</td>
                <td> {{ $warehouse->SoLuongCon }} </td>
                <td> {{ $warehouse->DonViTinh }} </td>
                <td>{{ $warehouse->TenNhaCC }}</td>
                <td>{{ $warehouse->updated_at }}</td>
            </tr>  
        @endforeach    
    </table>

</body>
</html>