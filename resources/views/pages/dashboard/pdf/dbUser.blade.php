<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User DashBoard PDF</title>
    <style>

        body{
            font-family: DejaVu Sans;
        }

        .page-break {
            page-break-after: always;
        }       

        .customers {
          /* font-family: Arial, Helvetica, sans-serif; */
          border-collapse: collapse;
          width: 100%;
        }
        
        .customers td, .customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        .customers tr:nth-child(even){background-color: #f2f2f2;}
        
        .customers tr:hover {background-color: #ddd;}
        
        .customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }

        h1{
            text-align: center;
        }

        
        </style>
</head>
<body>
    <h1>Thu nhập theo từng nhân viên</h1>
    @foreach ($countOrder as $order)
        <h3>Nhân viên :NV00{{  $order->IDNhanVien }}</h3>
        <table class="customers">
            <tr>
                <th>Đơn hàng hôm nay</th>
                <th>Doanh thu hôm nay</th>
                <th>Doanh thu tháng này</th>
            </tr>
            <tr>
                <td>{{ $order->orderD }}</td>
                <td>${{ $order->MoneyD }}</td>
                <td>${{ $order->MoneyM }}</td>
            </tr>
        </table>
    @endforeach

    {{-- <div class="page-break"></div> --}}
    <h1>Đơn hàng mới nhất</h1>
    <table class="customers">
        <tr>
            <th>STT</th>
            <th>Mã ĐH</th>
            <th>Nhân viên</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo đơn</th>
        </tr>
        @foreach ($topNewOrder as $key => $order)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    #HD00{{ $order->IDHoaDon }}
                </td>
                <td>{{ $order->TenNV }}</td>
                <td>${{ $order->TongTien }}</td>
                <td>
                    {{ $order->created_at }}
                </td>
            </tr>
        @endforeach
    </table>
    

</body>
</html>