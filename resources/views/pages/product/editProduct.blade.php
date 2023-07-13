@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Cập nhật sản phẩm</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">CẬP NHẬT MÓN</h1>
  
    
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
            <h2 class="header-title">Cập nhật món</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href=" {{ route('productList') }} ">Thực đơn</a>
                    <a class="breadcrumb-item active" href="#">Cập nhật món</a>
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 20px;">

            <form action="{{ route('updateProduct') }}"  method="post" enctype="multipart/form-data">
                <div class="page-header no-gutters has-tab">
                    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                        <div class="media align-items-center m-b-15">
                            <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                <img src=" {{ asset('images/'.$data[0]->HinhAnh) }} " alt="">
                            </div>
                            <div class="m-l-15">
                                <h4 class="m-b-0">{{$data[0]->TenSP}}</h4>
                                <p class="text-muted m-b-0">Mã : {{$data[0]->IDSanPham}}</p>
                            </div>
                        </div>
                        <div class="m-b-15">
                            <a href=" {{ route('productList') }} " class="btn btn-default m-r-5">
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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#product-edit-description">Mô Tả</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content m-t-15">
                    <div class="tab-pane fade show active" id="product-edit-basic" >
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productName">Tên Món</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Ten mon</span>
                                        </div>
                                        <input id="text"  name="name_product"  value=" {{old('name_product') ?? $data[0]->TenSP  }} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    @error('name_product')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productPrice">Giá</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Gia</span>
                                        </div>
                                        <input id="text"  name="price_product"  value=" {{old('price_product') ?? $data[0]->Gia }} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    @error('price_product')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productCategory">Danh Mục</label>
                                    <select name="categories" id="Categories" class="custom-select" id="productCategory">
                                        <option selected value="{{$data[0]->IDDanhMucSP}}" >{{ $data[0]->TenDMSP }}</option>
                                        @if (!empty($allCategories))
                                            @foreach ($allCategories as $category)
                                                <option value="{{$category->IDDanhMucSP}}"  {{old('category_id')==$category->IDDanhMucSP?'selected':false}} > {{$category->TenDMSP}} </option>
                                            @endforeach
                                        @endif                      
                                    </select>
                                    @error('categories')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productStatus">Đơn Vị Tính</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Don vi tinh</span>
                                        </div>
                                        <input id="text"  name="unit_product"  value=" {{old('unit_product') ?? $data[0]->DonViTinh }} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    @error('unit_product')
                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-semibold" for="productBrand">Hình Ảnh</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload"  class="ec-image-upload" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload">
                                            </label>
                                        </div>
                                        @error('thumbnail')
                                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-edit-description">
                        <div class="card">
                            <div class="card-body">
                                <div id="productDescription">
                                    <label class="font-weight-semibold" for="productName">Mô Tả</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Mo ta</span>
                                        </div>
                                        <input  name="des_product" value=" {{old('des_product') ?? $data[0]->MoTa }} " class="form-control" aria-label="With textarea">
                                    </div>
                                    @error('des_product')
                                        <span style="color:red;display: block;margin-bottom: 10px;">{{$message}}</span>
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
