<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Detail PDF</title>
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

        .infor{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px; 
        }

        .infor-cafe{
            flex: 1;
            margin-bottom: 20px; 
        }

        .infor-order{
            flex: 1;
        }

        .sign{
            float: right; 
        }
     
        </style>
</head>
<body>
    {{-- <div class="container">
        <div class="card">
            <div class="card-body">
                <div id="invoice" class="p-h-30">
                    <div class="" style="text-align: center">
                        <h2>Hóa Đơn</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 m-t-15 lh-2">
                            <div class="inline-block">
                                <img class="img-fluid" src="assets/images/logo/logo.png" alt="">
                                <address class="p-l-10">
                                    <span class="font-weight-semibold text-dark">For Cafe</span><br>
                                    <span>123 Nguyen Tat Thanh</span><br>
                                    <abbr class="text-dark" title="Phone">Phone:</abbr>
                                    <span>(123) 456-7890</span>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-20 lh-2">
                        <div class="col-sm-12">
                            <div class="">
                                <div class=" text-uppercase d-inline-block">
                                <span class="font-weight-semibold ">Mã đơn hàng :  <u>HD00{{ $data[0]->IDHoaDon }}</u></span></div>
                            </div>
                            <div class=" text-uppercase d-inline-block">
                                <span class="font-weight-semibold ">Ngày tạo : <u>{{ $data[0]->created_at }}</u></span>
                            </div>   
                            <div class="">
                                <div class=" text-uppercase d-inline-block">
                                    <span class="font-weight-semibold ">Mã nhân viên tạo đơn :  <u>NV00{{ $data[0]->IDNhanVien }}</u></span>
                                </div> 
                            </div>                 
                        </div>
                    </div>
                    <div class="m-t-20">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Món</th>
                                        <th>Số lượng</th>
                                        <th>Gía</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $data)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $data->TenSP }}</td>
                                        <td>{{ $data->SoLuong }}</td>
                                        <td>{{ $data->Gia }}</td>
                                        <td>{{ $data->SoLuong * $data->Gia }}</td>
                                        <p style="display: none">{{ $tongtien = $tongtien + ($data->SoLuong * $data->Gia) }}</p>
                                    </tr> 
                                    @endforeach                                
                                </tbody>
                            </table>
                        </div>
                        <div class="row m-t-30 lh-1-8">
                            <div class="col-sm-12">
                                <div class="float-right text-right">
                                    <hr>
                                    <h3><span class="font-weight-semibold text-dark">Total :</span>
                                        {{$tongtien}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row m-v-20">
                            
                            <div class="col-sm-6 text-right">
                                <small><span class="font-weight-semibold text-dark">Phone:</span> (123) 456-7890</small>
                                <br>
                                <small>forcafe@gmail.com</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <h1>Hóa đơn</h1>
    <div class="infor">
        <div class="infor-cafe">
            <span >For Cafe</span><br>
            <span>123 Nguyen Tat Thanh</span><br>
            <abbr>Phone:</abbr>
            <span>(123) 456-7890</span>
        </div>
    
        <div class="infor-order">
            <span >Mã đơn hàng :  <u>HD00{{ $data[0]->IDHoaDon }}</u></span><br>
            <span >Ngày tạo : <u>{{ $data[0]->created_at }}</u></span><br>
            <span >Nhân viên tạo đơn :  <u>{{ session()->get('inforUser')[0]->TenNV }}</u></span>
        </div>  
    </div>
    <table class="customers">
        <tr>
            <th>STT</th>
            <th>Món</th>
            <th>Số lượng</th>
            <th>Gía</th>
            <th>Thành tiền</th>
        </tr>
        @foreach ($data as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->TenSP }}</td>
                <td> {{ $data->SoLuong }} </td>
                <td>{{ $data->Gia }}</td>
                <td>{{ $data->SoLuong * $data->Gia }}</td>
            </tr>  
            <p style="display: none">{{ $tongtien = $tongtien + ($data->SoLuong * $data->Gia) }}</p>
        @endforeach    
    </table>

    <hr>
    <h3><span>Total :</span>
        {{$tongtien}}
    </h3>

    <div class="phone">
        <span>Phone:</span> (123) 456-7890
    </div>

    <div class="sign">
        <p>Nhân viên tạo đơn</p>
        <h2>{{ session()->get('inforUser')[0]->TenNV }}</h2>
    </div>

</body>
</html>