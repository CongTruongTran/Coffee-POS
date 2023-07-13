@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Thêm nhà cung cấp</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">THÊM NHÀ CUNG CẤP</h1>

    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        @if (session('msgtrue'))
            <div class="alert alert-success">
                <div class="d-flex justify-content-start">
                    <span class="alert-icon m-r-20 font-size-30">
                        <i class="anticon anticon-check-circle"></i>
                    </span>
                    <div>
                        <h5 class="alert-heading">Thành công</h5>
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
                        <h5 class="alert-heading">Cảnh báo</h5>
                        <p>Kiểm tra lại thông tin vừa nhập</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Content Wrapper START -->
    <div style="padding: 20px" class="">

        <div class="page-header">
            <h2 class="header-title">Thêm nhà cung cấp</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="#">Nhà cung cấp</a>
                    <a class="breadcrumb-item active" href="#">Thêm nhà cung cấp</a>
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 40px; margin: 40px;">
            <div class="row m-b-30">
                <div class="col-lg-8">
                    <h2>Thêm Nhà Cung Cấp</h2>
                </div>
                <div class="col-lg-4 text-right">
                    <a href=" {{ route('supplierList') }} ">
                        <button class="btn btn-primary">
                            <i class="anticon anticon-ordered-list"></i>
                            <span>Xem tất cả</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="m-t-25 ">
                <div id="data-table_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <form action="" method="post">
                        
                        {{-- <div class="col-lg-8">
                            <p>Nhập thông tin nhà cung cấp</p>
                        </div> --}}

                        <label class="font-weight-semibold" for="productName">Tên Nhà Cung Cấp</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Ten nha cung cap</span>
                            </div>
                            <input id="text"  name="name_supplier" placeholder="Ten..." value=" {{old('name_supplier')}} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        @error('name_supplier')
                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                        @enderror

                        <label class="font-weight-semibold" for="productName">Địa Chỉ</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Dia chi</span>
                            </div>
                            <input id="text"  name="addr_supplier" placeholder="Ten..." value=" {{old('addr_supplier')}} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        @error('addr_supplier')
                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                        @enderror

                        <label class="font-weight-semibold" for="productName">Số Điện Thoại</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">So dien thoai</span>
                            </div>
                            <input id="text"  name="phone_supplier" placeholder="Ten..." value=" {{old('phone_supplier')}} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        @error('phone_supplier')
                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                        @enderror

                        <label class="font-weight-semibold" for="productName">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                            </div>
                            <input id="text"  name="email_supplier" placeholder="Ten..." value=" {{old('email_supplier')}} " type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        @error('email_supplier')
                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                        @enderror


                        <div class="row">
                            {{-- <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
                            </div> --}}
                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-primary">
                                    <i class="anticon anticon-save"></i>
                                    <span>Lưu</span>
                                </button> 

                                <a href=" {{ route('supplierList') }} " class="btn btn-default m-r-5">
                                    <i class="anticon anticon-step-backward"></i>
                                    Thoát
                                </a>
                            </div>
                        </div>
                        @csrf
                    </form>


                </table>
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
    </script>
@endsection
