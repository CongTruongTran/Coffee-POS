@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Thêm người dùng</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">THÊM NGƯỜI DÙNG</h1>
  
    
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
            <h2 class="header-title">Thêm người dùng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href=" {{ route('productList') }} ">Người dùng</a>
                    <a class="breadcrumb-item active" href="#">Thêm người dùng</a>
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 20px;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="page-header no-gutters has-tab">
                    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                        <div class="media align-items-center m-b-15">
                            <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                <img src=" {{ asset('assets/images/others/thumb-16.jpg') }} " alt="">
                            </div>
                            <div class="m-l-15">
                                <h4 class="m-b-0">For Cafe</h4>
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
                    </ul>
                </div>
                <div class="tab-content m-t-15">
                    <div class="tab-pane fade show active" id="product-edit-basic" >
                        <div class="card">
                            <div class="card-body">
        
                                <hr class="m-v-25">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="font-weight-semibold" for="userName">Tên</label>
                                            <input name="name" type="text" class="form-control" id="userName" placeholder="User Name" >
                                            @error('name')
                                                <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="font-weight-semibold" for="email">Email</label>
                                            <input name="email" type="email" class="form-control" id="email" placeholder="email" >
                                            @error('email')
                                                <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="font-weight-semibold" for="phoneNumber">Số Điện Thoại</label>
                                            <input name="SĐTh" type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                                            @error('SĐTh')
                                                <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="font-weight-semibold" for="dob">Ngày Vào Làm</label>
                                            <input name="created" type="datetime-local" class="form-control" id="dob" placeholder="Date of Birth">
                                            @error('created')
                                                <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="font-weight-semibold" for="language">Chức Vụ</label>
                                            <select name="position" id="language" class="form-control">
                                                <option value="0">Chọn chức vụ</option>
                                                <option value="QuanLi">Quản lí</option>
                                                <option value="Nhân viên">Nhân viên</option>
                                            </select>
                                            @error('position')
                                                <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="fullAddress">Địa Chỉ</label>
                                        <input name="addr" type="text" class="form-control" id="fullAddress" placeholder="Full Address">
                                        @error('addr')
                                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="language">Giới Tính</label>
                                        <select name="sex" id="language-2" class="form-control">
                                            <option value="0">Chọn giới tính</option>
                                            <option>Nam</option>
                                            <option>Nu</option>
                                        </select>
                                        @error('sex')
                                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="productBrand">Hình Ảnh</label>
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" class="ec-image-upload" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload"></label>
                                            </div>
                                            @error('thumbnail')
                                                <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
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
