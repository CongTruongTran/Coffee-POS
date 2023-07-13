@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Lịch sử nhập hàng</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">LỊCH SỬ NHẬP HÀNG</h1>
    
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
            <h2 class="header-title">Lịch sử nhập hàng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="#">Kho hàng</a>
                    <a class="breadcrumb-item active" href="#">Lịch sử nhập hàng</a>
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 20px;">
            <div class="row m-b-30">
                <div class="col-lg-8">

                </div>
                <div class="col-lg-4 text-right">
                    <a href=" {{ route('inputWarehouse') }} ">
                        <button class="btn btn-primary">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Nhập hàng</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="m-t-25 ">
                <div id="data-table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 60px;">STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Tên hàng</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Nhân viên</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Số lượng nhập</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 90px;">Gía</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 200px;">Tổng tiền</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 240px;">Ngày nhập</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($allHistoryWarehouse as $key => $historyWarehouse)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td> {{ $historyWarehouse->TenHang }} </td>
                                            <td>{{ $historyWarehouse->TenNV }}</td>
                                            <td>{{ $historyWarehouse->SoLuongNhap }}</td>
                                            <td class="product_price">{{ $historyWarehouse->Gia }}</td>
                                            <td class="product_price">{{ $historyWarehouse->SoLuongNhap *  $historyWarehouse->Gia }}</td>
                                            <td>{{ $historyWarehouse->updated_at }}</td>
                                            
                                        </tr>                                  
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">STT</th>~~
                                        <th rowspan="1" colspan="1">Tên hàng</th>
                                        <th rowspan="1" colspan="1">Nhân viên</th>
                                        <th rowspan="1" colspan="1">Số lượng nhập</th>
                                        <th rowspan="1" colspan="1">Gía</th>
                                        <th rowspan="1" colspan="1">Tổng tiền</th>
                                        <th rowspan="1" colspan="1">Ngày nhập</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>~~
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
