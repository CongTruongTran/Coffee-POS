<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product DashBoard PDF</title>
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
    <h1>Thu nhập của quán</h1>
    @foreach ($countProduct as $item)
        <table class="customers">
            <tr>
                <th>Số lượng đơn hàng hôm nay</th>
                <th>Doanh thu hôm nay</th>
                <th>Doanh thu tháng này</th>
            </tr>
            <tr>
                <td>{{ $item->CountD }}</td>
                <td>${{ $item->MoneyD }}</td>
                <td>${{ $item->MoneyM }}</td>
            </tr>
        </table>
    @endforeach

    {{-- <div class="page-break"></div> --}}
    <h1>Top sản phẩm bán chạy nhất</h1>
    <table class="customers">
        <tr>
            <th>Mã SP</th>
            <th>Sản Phẩm</th>
            <th>Gia</th>
            <th>Đơn vị tính</th>
            <th>Số lượng đã bán</th>
        </tr>
        @foreach ($topProduct as $item)
            @foreach ($products as $product)
                 @if ($item->IDSanPham === $product->IDSanPham)
                    <tr>
                        <td> SP00{{ $product->IDSanPham }} </td>
                        <td>{{$product->TenSP}}</td>
                        <td>${{$product->Gia}}</td>
                        <td>{{$product->DonViTinh}}</td>
                        <td>{{$item->soluong}}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </table>
    

</body>
</html>