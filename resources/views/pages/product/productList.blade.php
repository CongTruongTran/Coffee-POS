@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Danh sách sản phẩm</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">DANH SÁCH MÓN</h1>
  
    
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
            <h2 class="header-title">Danh sánh món</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="#">Thực đơn</a>
                    <a class="breadcrumb-item active" href="#">Danh sách món</a>
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 20px;">
            <div class="row m-b-30">
                <div class="col-lg-8">
                    <div class="d-md-flex">
                        <div class="m-b-10 m-r-15">
                            <select class="custom-select" style="min-width: 180px;">
                                <option selected>Danh Mục</option>

                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->TenDMSP }}"> {{ $category->TenDMSP }} </option>                                   
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 text-right">
                    <a href="{{ route('export_product') }}">
                        <button class="btn btn-success">
                            <i class="anticon anticon-file-pdf"></i>
                            <span>Xuất PDF</span>
                        </button>
                    </a>
                    <a href={{ route('addProduct') }}>
                        <button class="btn btn-primary">
                                <i class="anticon anticon-plus-circle m-r-5"></i>
                                <span>Thêm Món</span>
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
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Sản Phẩm</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150px;">Danh Mục</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 90px;">Giá</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 240px;">Mô Tả</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Đơn Vị Tính</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Action</th>
                                        {{-- <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="{{ asset('images/'.$product->HinhAnh) }}" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"> {{ $product->TenSP }} </h6>
                                                </div>
                                            </td>
                                            <td> {{ $product->TenDMSP }} </td>
                                            <td class="product_price">
                                                {{ $product->Gia }}                                                                                                                                  
                                            </td>
                                            <td>{{ $product->MoTa }}</td>
                                            <td>{{ $product->DonViTinh }}</td>
                                            <td class="">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <a href="{{ route('editProduct', ['id'=>$product->IDSanPham]) }}"><i class="anticon anticon-edit"></i></a>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <a onclick="return confirm('Ban co chac chan muon xoa khong ?')" 
                                                        href="{{ route('deleteProduct', ['id'=>$product->IDSanPham]) }}">
                                                        <i class="anticon anticon-delete"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>                                  
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">STT</th>
                                        <th rowspan="1" colspan="1">Sản Phẩm</th>
                                        <th rowspan="1" colspan="1">Danh Mục</th>
                                        <th rowspan="1" colspan="1">Giá</th>
                                        <th rowspan="1" colspan="1">Mô Tả</th>
                                        <th rowspan="1" colspan="1">Đơn Vị Tính</th>
                                        <th rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
