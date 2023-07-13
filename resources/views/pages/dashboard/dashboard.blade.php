@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Thống kê</title>
@endSection


@section('content')
    <div style="height: 70px">
    </div>

    <div class="container">
        <div class="text-center m-t-30 m-b-40">
            <h1 style="padding: 20px; color: #CDA566">THỐNG KÊ</h1>
            <div class="btn-group">
                <button type="button" id="monthly-btn" class="btn btn-default active">
                    <span>Người bán</span>
                </button>
                <button type="button" id="annual-btn" class="btn btn-default">
                    <span>Sản phẩm</span>
                </button>
            </div>
        </div>

        <div class="row align-items-center" id="monthly-view">

            <div class="" style="display: flex;justify-content: flex-end; margin-bottom: 20px;float: right; width: 100%;">
                <a class="btn btn-success" href="{{ route('export_dashboard_user') }}">
                    <i class="anticon anticon-file-pdf"></i>
                    Xuất PDF
                </a>
            </div>

            @foreach ($countOrder as $order)

                    <div class="col-md-12">
                        <h4 style="display: block" class="">ID nhân viên : NV00{{  $order->IDNhanVien }}</h4>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-b-20 border-bottom">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-blue avatar-icon" style="height: 55px; width: 55px;">
                                            <i class="anticon anticon-coffee font-size-25" style="line-height: 55px"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="font-weight-bold font-size-30 m-b-0">
                                                {{ $order->orderD }}
                                                <span class="font-size-13 font-weight-semibold">/ hôm nay</span>
                                            </h2>
                                            <h4 class="m-b-0">Đơn Hàng</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-b-20 border-bottom">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-cyan avatar-icon" style="height: 55px; width: 55px;">
                                            {{-- <i class="anticon anticon-shop font-size-25" style="line-height: 55px"></i> --}}
                                            <i class="anticon anticon-dollar font-size-25" style="line-height: 55px"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <div class="" style="display: flex;align-items: center;">
                                                <h2 class="font-weight-bold font-size-30 m-b-0 product_price">
                                                    {{ $order->MoneyD }}
                                                </h2>
                                                <span class="font-size-13 font-weight-semibold m-t-15">/ hôm nay</span>
                                            </div>
                                            <h4 class="m-b-0">Doanh Thu</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-b-20 border-bottom">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-gold avatar-icon" style="height: 55px; width: 55px;">
                                            <i class="anticon anticon-dollar font-size-25" style="line-height: 55px"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <div class="" style="display: flex;align-items: center;">
                                                <h2 class="font-weight-bold font-size-30 m-b-0 product_price">
                                                    {{ $order->MoneyM }}
                                                </h2>
                                                <span class="font-size-13 font-weight-semibold m-t-15">/ tháng này</span>
                                            </div>
                                            <h4 class="m-b-0">Doanh Thu</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

            @endforeach

            {{-- top don hang moi nhat  --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Đơn hàng mới nhất</h5>
                            <div>
                                <a href=" {{ route('orderList') }} ">
                                    <button class="btn btn-primary">
                                        <i class="anticon anticon-ordered-list"></i>
                                        <span>Xem tất cả</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã ĐH</th>
                                            <th>Nhân viên</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày tạo đơn</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                                                            
                                        @foreach ($topNewOrder as $key => $order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    #HD00{{ $order->IDHoaDon }}
                                                </td>
                                                <td>{{ $order->TenNV }}</td>
                                                <td class="product_price">{{ $order->TongTien }}</td>
                                                <td>
                                                    {{ $order->created_at }}
                                                </td>
                                            </tr>
                                        @endforeach                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            

        <div class="row align-items-center d-none" id="annual-view">

            <div class="" style="display: flex;justify-content: flex-end; margin-bottom: 20px;float: right; width: 100%;">
                <a class="btn btn-success" href="{{ route('export_dashboard_product') }}">
                    <i class="anticon anticon-file-pdf"></i>
                    Xuất PDF
                </a>
            </div>

            @foreach ($countProduct as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-b-20 border-bottom">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-blue avatar-icon" style="height: 55px; width: 55px;">
                                        <i class="anticon anticon-coffee font-size-25" style="line-height: 55px"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <h2 class="font-weight-bold font-size-30 m-b-0">
                                            {{ $item->CountD }}
                                            <span class="font-size-13 font-weight-semibold">/ hôm nay</span>
                                        </h2>
                                        <h4 class="m-b-0">Sản phẩm</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-b-20 border-bottom">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-cyan avatar-icon" style="height: 55px; width: 55px;">
                                        <i class="anticon anticon-dollar font-size-25" style="line-height: 55px"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <div class="" style="display: flex;align-items: center;">
                                            <h2 class="font-weight-bold font-size-30 m-b-0 product_price">
                                                {{ $item->MoneyD }}
                                            </h2>
                                            <span class="font-size-13 font-weight-semibold m-t-15">/ hôm nay</span>
                                        </div>
                                        <h4 class="m-b-0">Doanh thu</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-b-20 border-bottom">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-gold avatar-icon" style="height: 55px; width: 55px;">
                                        <i class="anticon anticon-dollar font-size-25" style="line-height: 55px"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <div class="" style="display: flex;align-items: center;">
                                            <h2 class="font-weight-bold font-size-30 m-b-0 product_price">
                                                {{ $item->MoneyM }}
                                            </h2>
                                            <span class="font-size-13 font-weight-semibold m-t-15">/ tháng này</span>
                                        </div>                                       
                                        <h4 class="m-b-0">Doanh thu</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- top sản phẩm bán chạy   --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Top sản phẩm bán chạy</h5>
                            <div>
                                <a href=" {{ route('productList') }} ">
                                    <button class="btn btn-primary">
                                        <i class="anticon anticon-ordered-list"></i>
                                        <span>Xem tất cả</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            {{-- <th>STT</th> --}}
                                            <th>Mã SP</th>
                                            <th>Sản Phẩm</th>
                                            <th>Gia</th>
                                            <th>Đơn vị tính</th>
                                            <th>Số lượng đã bán</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($topProduct as $item)
                                            @foreach ($products as $product)
                                                @if ($item->IDSanPham === $product->IDSanPham)
                                                    <tr>
                                                        <td>SP00{{ $product->IDSanPham }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="{{ asset('images/'.$product->HinhAnh) }}" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">{{$product->TenSP}}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="product_price">{{$product->Gia}}</td>
                                                        <td>{{$product->DonViTinh}}</td>
                                                        <td>{{$item->soluong}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- chart danh muc --}}
        <div class="">
            <h3>Danh Mục Sản Phẩm : </h3>
            <div class="ct-chart" id="donut-chart"></div>
            <button style="" class="m-t-5 btn btn-primary m-r-5"></button> : Nước ép trái cây   <br/>
            <button class="m-t-5 btn btn-success m-r-5"></button> : Cà phê   <br/>
            <button class="m-t-5 btn btn-warning m-r-5"></button> : Nước ngọt  <br/>
            <button class="m-t-5 btn btn-danger m-r-5"></button> : Trà  <br/>
            <button class="m-t-5 btn btn-secondary m-r-5"></button> : Đồ ăn vặt<br/>
        </div>
    </div>


    {{-- <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">$23,523</h2>
                            <p class="m-b-0 text-muted">Profit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">+ 17.21%</h2>
                            <p class="m-b-0 text-muted">Growth</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-profile"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">3,685</h2>
                            <p class="m-b-0 text-muted">Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">1,832</h2>
                            <p class="m-b-0 text-muted">Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


   

@endsection


@section("customJs")
    <script src=" {{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }} "></script>
    <script src=" {{ asset('assets//js/pages/pricing.js') }}"></script>
    <script src=" {{ asset('assets/vendors/chartist/chartist.min.js') }} "></script>
    <script>
        $('#data-table').DataTable();

        var prices = $('.product_price');
        for(let i = 0;i<prices.length;i++){
            prices[i].innerText = parseInt(prices[i].innerText).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }
    </script>
    <script>

        new Chartist.Pie('#donut-chart', {
        series: [2, 2, 1, 1,2]
        }, {
        donut: true,
        donutWidth: 60,
        donutSolid: true,
        startAngle: 270,
        showLabel: true
    });
    </script>
@endsection