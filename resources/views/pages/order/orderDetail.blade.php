@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Chi tiết đơn hàng</title>
@endSection





@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">CHI TIẾT ĐƠN HÀNG</h1>
  
    
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        @if (session('msgtrue'))
            <div class="alert alert-success">
                <div class="d-flex justify-content-start">
                    <span class="alert-icon m-r-20 font-size-30">
                        <i class="anticon anticon-check-circle"></i>
                    </span>
                    <div>
                        <h5 class="alert-heading">Thành Công</h5>
                        <p>{{session('msgtrue')}}</p>
                    </div>
                </div>
            </div>
        @endif 

        @if (session('msg'))
        <div class="alert alert-danger">
            <div class="d-flex justify-content-start">
                <span class="alert-icon m-r-20 font-size-30">
                    <i class="anticon anticon-close-circle"></i>
                </span>
                <div>
                    <h5 class="alert-heading">Lỗi</h5>
                    <p>{{session('msg')}}</p>
                </div>
            </div>
        </div>
        @endif 
        
        @if ($errors->any())
            <div class="alert alert-warning">
                <div class="d-flex justify-content-start">
                    <span class="alert-icon m-r-20 font-size-30">
                        <i class="anticon anticon-exclamation-circle"></i>
                    </span>
                    <div>
                        <h5 class="alert-heading">Cảnh Báo</h5>
                        <p>Kiểm tra lại thông tin vừa nhập</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Content Wrapper START -->
    <div style="padding: 20px" class="">

        <div class="page-header">
            <h2 class="header-title">Chi tiết đơn hàng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="#">Đơn hàng</a>
                    <a class="breadcrumb-item active" href="#">Chi tiết đơn hàng</a>
                    {{-- <span class="breadcrumb-item active">Orders List</span> --}}
                </nav>
            </div>
        </div>

        
        <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
            @if (session('msgtrue'))
                <div class="alert alert-success">
                    <div class="d-flex justify-content-start">
                        <span class="alert-icon m-r-20 font-size-30">
                            <i class="anticon anticon-check-circle"></i>
                        </span>
                        <div>
                            <h5 class="alert-heading">Thanh Cong</h5>
                            <p>{{session('msgtrue')}}</p>
                        </div>
                    </div>
                </div>
            @endif 
    
            @if (session('msg'))
            <div class="alert alert-danger">
                <div class="d-flex justify-content-start">
                    <span class="alert-icon m-r-20 font-size-30">
                        <i class="anticon anticon-close-circle"></i>
                    </span>
                    <div>
                        <h5 class="alert-heading">Lỗi</h5>
                        <p>{{session('msg')}}</p>
                    </div>
                </div>
            </div>
            @endif 
    
            @if ($errors->any())
                <div class="alert alert-warning">
                    <div class="d-flex justify-content-start">
                        <span class="alert-icon m-r-20 font-size-30">
                            <i class="anticon anticon-exclamation-circle"></i>
                        </span>
                        <div>
                            <h5 class="alert-heading">Canh bao</h5>
                            <p>Kiem tra lai thong tin vua nhap</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        
    </div>
    <div class="container">
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
                        <div class="col-sm-6" style="display: flex;justify-content: flex-end;align-items: center;">
                            <a href="{{ route('export_orderdetail', ['id'=>$data[0]->IDHoaDon]) }}">
                                <button class="btn btn-success">
                                    <i class="anticon anticon-file-pdf"></i>
                                    <span>Xuất PDF</span>
                                </button>
                            </a>
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
                                    <span class="font-weight-semibold ">Nhân viên tạo đơn :  <u>{{ session()->get('inforUser')[0]->TenNV }}</u></span>
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
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img class="img-fluid rounded" src="{{ asset('images/'.$data->HinhAnh) }}" style="max-width: 60px" alt="">
                                                <h6 class="m-b-0 m-l-10"> {{ $data->TenSP }} </h6>
                                            </div>    
                                        </td>
                                        <td>{{ $data->SoLuong }}</td>
                                        <td class="product_price">{{ $data->Gia }}</td>
                                        <td class="product_price">{{ $data->SoLuong * $data->Gia }}</td>
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
                                    <h3>
                                        <div class="" style="display: flex">
                                            <p class="font-weight-semibold text-dark m-r-20" >Total :</p>
                                            <p class="product_price">{{$tongtien}}</p>
                                        </div>
                                        {{-- {{ $data->TongTien }} --}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row m-v-20">
                            <div class="col-sm-6">
                                <a href=" {{ route('orderList') }} " class="btn btn-primary m-r-5">
                                    <i class="anticon anticon-step-backward"></i>
                                    Thoát
                                </a>
                            </div>
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
    </div>
    <!-- Content Wrapper END -->


    
@endsection


@section("customJs")
    <script src=" {{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }} "></script>
    <script>
        $('#data-table').DataTable();

        var prices = $('.product_price');
        for(let i = 0;i<prices.length;i++){
            prices[i].innerText = parseInt(prices[i].innerText).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }
    </script>
@endsection