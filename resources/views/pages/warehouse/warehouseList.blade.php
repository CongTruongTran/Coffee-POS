@extends("layout.main_layout")

@section("cssForPage")
    <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">
@endsection

@section("title")
    <title>Kho hàng</title>
@endSection



@section('content')
    <div style="height: 70px">
    </div>
    <h1 style="padding: 20px; color: #CDA566">KHO HÀNG</h1>
  
    
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
            <h2 class="header-title">Kho hàng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="#">Kho hàng</a>
                    <a class="breadcrumb-item active" href="#">Hàng hóa</a>
                    {{-- <span class="breadcrumb-item active">Orders List</span> --}}
                </nav>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.13) 0px 0px 10px 0px; border-radius: 15px; padding: 20px;">
            <div class="row m-b-30">
                <div class="col-lg-8">
                    <a href="{{ route('export_historywarehouse') }}">
                        <button class="btn btn-success">
                            <i class="anticon anticon-file-pdf"></i>
                            <span>Xuất PDF</span>
                        </button>
                    </a>
                </div>
                <div class="col-lg-4 text-right">
                    {{-- <a href={{ route('addWarehouse') }}> --}}
                        {{-- <button class="btn btn-primary">
                                <i class="anticon anticon-plus-circle m-r-5"></i>
                                <span>Thêm loại hàng hóa</span>
                        </button> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Thêm mới hàng hóa</span>
                        </button>
                    {{-- </a> --}}
                </div>
            </div>
            <div class="m-t-25 ">
                <div id="data-table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Tên</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 300px;">Số lượng còn</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 300px;">Đơn vị tính</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 300px;">Nhà cung cấp</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 300px;">Ngày cập nhật</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($allWarehouse as $key => $warehouse)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$key + 1}}</td>
                                            <td>{{$warehouse->TenHang}}</td>
                                            <td>{{$warehouse->SoLuongCon}}</td>
                                            <td>{{$warehouse->DonViTinh}}</td>
                                            <td>{{$warehouse->TenNhaCC}}</td>
                                            <td>{{$warehouse->updated_at}}</td>
                                            <td>                                                
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <a href="{{ route('editWarehouse', ['id'=>$warehouse->IDKhoHang]) }}">
                                                        <i class="anticon anticon-edit"></i>
                                                    </a>
                                                </button>
                                                {{-- <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <a onclick="return confirm('Ban co chac chan muon xoa khong ?')" 
                                                    href="{{ route('deleteWarehouse', ['id'=>$warehouse->IDKhoHang]) }}">
                                                        <i class="anticon anticon-delete"></i>
                                                    </a>
                                                </button> --}}
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">STT</th>
                                        <th rowspan="1" colspan="1">Tên</th>
                                        <th rowspan="1" colspan="1">Số lượng còn</th>
                                        <th rowspan="1" colspan="1">Đơn vị tính</th>
                                        <th rowspan="1" colspan="1">Nhà cung cấp</th>
                                        <th rowspan="1" colspan="1">Ngày cập nhật</th>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới hàng hóa</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action=" {{ route('addWarehouse') }} " method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" id="product-edit-basic" >
                                <div class="card">
                                    <div class="card-body">             
                                        <div class="m-v-25">
                                            <div class="form-row">       
                                                <div class="form-group col-md-12">
                                                    <label class="font-weight-semibold" for="language">Nhà cung cấp</label>
                                                    <select name="supp" id="language" class="form-control">
                                                        <option value="0">Chọn hàng </option>
                                                        @foreach ($allSupplier as $supplier)
                                                            <option value="{{ $supplier->IDNhaCC}}">{{ $supplier->TenNhaCC }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('supp')
                                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                                    @enderror
                                                </div>        
        
                                                <div class="form-group col-md-12">
                                                    <label class="font-weight-semibold" for="userName">Tên hàng</label>
                                                    <input name="name" type="text" class="form-control" id="name" onchange="caltulator()">
                                                    @error('name')
                                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                                    @enderror
                                                </div>
        
                                                <div class="form-group col-md-12">
                                                    <label class="font-weight-semibold" for="email">Đơn vị tính</label>
                                                    <input name="unit" type="text" class="form-control" id="unit" onchange="caltulator()">
                                                    @error('unit')
                                                        <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                                    @enderror
                                                </div>       
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        </div>                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button  type="submit" class="btn btn-primary">
                            <i class="anticon anticon-save"></i>
                            <span>Lưu</span>
                        </button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>


    
@endsection

@section("customJs")
    <script src=" {{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }} "></script>
    <script>
        $('#data-table').DataTable();
    </script>
@endsection
