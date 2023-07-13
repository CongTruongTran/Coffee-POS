@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Người dùng</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">DANH SÁCH NGƯỜI DÙNG</h1>
    
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
            <h2 class="header-title">Danh sánh người dùng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="#">Người dùng</a>
                    <a class="breadcrumb-item active" href="#">Danh sách người dùng</a>
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 20px;">
            <div class="page-header no-gutters">
                <div class="row align-items-md-center">
                    <div class="col-md-6">
                        <div class="media m-v-10">
                            <div class="avatar avatar-cyan avatar-icon avatar-square">
                                <i class="anticon anticon-star"></i>
                            </div>
                            <div class="media-body m-l-15">
                                <h6 class="mb-0">{{$countUsers}} thành viên</h6>
                                <span class="text-gray font-size-13">For Cafe</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right m-v-10">
                            <div class="btn-group">
                                <button id="list-view-btn" type="button" class="btn btn-default btn-icon">
                                    <i class="anticon anticon-ordered-list"></i>
                                </button>
                                <button id="card-view-btn" type="button" class="btn btn-default btn-icon active">
                                    <i class="anticon anticon-appstore"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <!-- Card View -->
                    <div class="row" id="card-view">                      
                        @foreach ($users as $user)
                        <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-t-20 text-center">
                                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                                <img src="{{ asset('images/'.$user->HinhAnh) }}" alt="avatar">
                                            </div>
                                            <h4 class="m-t-30">{{ $user->TenNV }}</h4>
                                            <p>{{ $user->ChucVu }}</p>
                                        </div>
                                        <div class="text-center m-t-15">
                                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                <i class="anticon anticon-facebook"></i>
                                            </button>
                                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                <i class="anticon anticon-instagram"></i>
                                            </button>
                                        </div>
                                        <div class="text-center m-t-30">
                                            <a href="{{ route('editUser', ['id'=>$user->IDNhanVien]) }}" class="btn btn-primary btn-tone">
                                                <i class="anticon anticon-setting"></i>                                               
                                                <span class="m-l-5">Setting</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach                           
                    </div>

                    <div class="row d-none" id="list-view">

                        <div class="col-sm-12 table-responsive">
                            <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 60px;">STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Tên</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">SDT</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Chức Vụ</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 200px;">Ngày Vào Làm</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="{{ asset('images/'.$user->HinhAnh) }}" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">{{ $user->TenNV }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> {{ $user->SĐTh }} </td>
                                            <td>{{ $user->ChucVu }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td class="">
                                                <a href="{{ route('editUser', ['id'=>$user->IDNhanVien]) }}" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-setting"></i>                                               
                                                    <span class="m-l-5">Setting</span>
                                                </a>
                                            </td>
                                        </tr>                                  
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">STT</th>
                                        <th rowspan="1" colspan="1">Tên</th>
                                        <th rowspan="1" colspan="1">SDT</th>
                                        <th rowspan="1" colspan="1">Chức Vụ</th>
                                        <th rowspan="1" colspan="1">Ngày Vào Làm</th>
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
    </script>

    
@endsection
