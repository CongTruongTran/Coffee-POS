@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Cập nhật hàng</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">CẬP NHẬT HÀNG HÓA</h1>
  
    
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
            <h2 class="header-title">Cập nhật hàng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href=" {{ route('productList') }} ">Hàng hóa</a>
                    <a class="breadcrumb-item active" href="#">Cập nhật hàng</a>
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 20px;">

            <form action="{{ route('updateWarehouse') }}"  method="post" enctype="multipart/form-data">
                <div class="page-header no-gutters has-tab">
                    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                        <div class="media align-items-center m-b-15">
                            {{-- <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                <img src="" alt="">
                            </div> --}}
                            <div class="m-l-15">
                                <h4 class="m-b-0">{{$data[0]->TenHang}}</h4>
                                <p class="text-muted m-b-0">Mã : NL00{{$data[0]->IDKhoHang}}</p>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <a href=" {{ route('warehouseList') }} " class="btn btn-default m-r-5">
                                <i class="anticon anticon-step-backward"></i>
                                Thoát
                            </a>

                            <button class="btn btn-primary">
                                <i class="anticon anticon-save"></i>
                                <span>Lưu</span>
                            </button>                         
                        </div>
                    </div>
                    <ul class="nav nav-tabs" >
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#product-edit-basic">Thông Tin</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content m-t-15">
                    <div class="tab-pane fade show active" id="product-edit-basic" >
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productName">Tên</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Tên</span>
                                        </div>
                                        <input id="text"  name="name_warehouse"  value=" {{old('name_warehouse') ?? $data[0]->TenHang  }} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    @error('name_warehouse')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productPrice">Số lượng còn</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">So Luong</span>
                                        </div>
                                        <input id="text"  name="quantity"  value=" {{old('quantity') ?? $data[0]->SoLuongCon }} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    @error('quantity')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productCategory">Nhà cung cấp</label>
                                    <select name="supplier" id="supplier" class="custom-select" id="productCategory">
                                        <option selected value="{{$data[0]->IDNhaCC}}" >{{ $data[0]->TenNhaCC }}</option>
                                        @if (!empty($allSupplier))
                                            @foreach ($allSupplier as $supplier)
                                                <option value="{{$supplier->IDNhaCC}}"  {{old('supplier_id')==$supplier->IDNhaCC?'selected':false}} > {{$supplier->TenNhaCC}} </option>
                                            @endforeach
                                        @endif                      
                                    </select>
                                    @error('supplier')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productStatus">Đơn vị tính</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Don vi tinh</span>
                                        </div>
                                        <input id="text"  name="unit_warehouse"  value=" {{old('unit_warehouse') ?? $data[0]->DonViTinh }} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    @error('unit_warehouse')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @csrf
            </form>
        </div>

        
    </div>
    <!-- Content Wrapper END -->


    
@endsection

@section("customJs")
    <script src=" {{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }} "></script>
    <script>
        $('#data-table').DataTable();
    </script>
@endsection
