<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Trang chủ</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.jpg') }}">

        <!-- page css -->
        <link href=" {{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }} " rel="stylesheet">

        <!-- Core css -->  
        <link href=" {{ asset('assets/css/app.min.css') }} " rel="stylesheet">
        <link rel="stylesheet" href="app.css">

        <!-- google font (Montserrat)-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="app">
            <div class="layout">
                
                <!-- Header START -->
                <div class="header">
                    <div class="logo logo-dark">
                        <a href=" {{ route('dashboard') }} ">
                            <h1 style="font-family: Steak;line-height: 75px ">FOR CAFE</h1>
                        </a>
                    </div>
                    <div class="logo logo-white">
                        <a href=" {{ route('dashboard') }} ">
                        </a>
                    </div>
                    <div class="nav-wrap">
                        <ul class="nav-left">
                            <li class="desktop-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon"></i>
                                </a>
                            </li>
                            <li class="mobile-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                    <i class="anticon anticon-search"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">    
                            <li class="dropdown dropdown-animated scale-left">
                                <div class="pointer" data-toggle="dropdown">
                                    <div class="avatar avatar-image  m-h-10 m-r-15">
                                        <img src="{{ asset('images/'.session()->get('inforUser')[0]->HinhAnh) }}"   alt="">
                                    </div>
                                </div>
                                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                        <div class="d-flex m-r-50">
                                            <div class="avatar avatar-lg avatar-image">
                                                <img src="{{ asset('images/'.session()->get('inforUser')[0]->HinhAnh) }}"  alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <p class="m-b-0 text-dark font-weight-semibold">{{ session()->get('inforUser')[0]->TenNV }}</p>
                                                <p class="m-b-0 opacity-07">{{ session()->get('inforUser')[0]->TenQuyen }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('editUser', ['id'=>session()->get('inforUser')[0]->IDNhanVien]) }}" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                                <span class="m-l-10">Cập nhật Profile</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                    <a href=" {{ route('login') }} " class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                                <span class="m-l-10">Đăng xuất</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                    <i class="anticon anticon-appstore"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>    
                <!-- Header END -->

                <!-- Page Container START -->
                {{-- <div class="page-container"> --}}
                    <!-- Content -->

                <div style="height: 70px">
                </div>
        
                <div class="container-fluid m-t-25 " >
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="w-100 pr-0 bg-white" id="cat-list">
                                        <div class="card mx-3 mb-2 cat-item" style="background: #CDA566;height:auto !important;border-radius: 10px;" data-id = 'all'>
                                            <div class="card-body">
                                                <span><b class="text-white">
                                                    All
                                                </b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >You Should Know </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;">You Should Know alsdkjasdkj </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >You Should Know </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >You Should Know </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >You Should Know </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;">You Should Know alsdkjasdkj </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >You Should Know </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                                <div class="p-10" >
                                                    <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >You Should Know </h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            {{-- <div class="card border-primary">
                                <div class="card-header text-white  border-primary">
                                    <b>Order List</b>
                                </div>
                                <div class="card-body">
                                    <form action="" id="manage-order">
                                    <input type="hidden" name="id" value="">
                                    <div class="bg-white" id='o-list'>
                                                <div class="d-flex w-100 bg-dark mb-1">
                                                    <label for="" class="text-white"><b>Order No.</b></label>
                                                    <input type="number" class="form-control-sm" name="order_number" value="" required>
                                                </div>
                                    <table class="table table-bordered bg-light" >
                                            <colgroup>
                                                <col width="20%">
                                                <col width="40%">
                                                <col width="40%">
                                                <col width="5%">
                                            </colgroup>
                                        <thead>
                                            <tr>
                                                <th>QTY</th>
                                                <th>Order</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="d-block bg-white" id="calc">
                                        <table class="" width="100%">
                                            <tbody>
                                                    <tr>
                                                    <td><b><h4>Total</h4></b></td>
                                                    <td class="text-right">
                                                        <input type="hidden" name="total_amount" value="0">
                                                        <input type="hidden" name="total_tendered" value="0">
                                                        <span class=""><h4><b id="total_amount">0.00</b></h4></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </form>
                            </div>
                        </div> --}}


                        {{-- <div class="row" id="bill-info">
                            <div class="col-md-2 table-infor">
                                
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-12 p-0 input-group">
                                    <input type="text" id="customer-infor" placeholder="Tìm khách hàng" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#ModelAddcustomer"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div id="result-customer"></div>
                                    <span class="del-customer"></span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control">
                                    <option value="1">Bảng giá chung</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="row bill-detail">
                            <div class="col-md-12 bill-detail-content">
                                <table class="table table-bordered">
                                <thead class="thead-light" >
                                    <tr>
                                    <th scope="col" style="background: #CDA566;" >STT</th>
                                    <th scope="col" style="background: #CDA566;" >Tên sản phẩm</th>
                                    <th scope="col" style="background: #CDA566;" >Số lượng</th>
                                    <th scope="col" style="background: #CDA566;" >Gía bán</th>
                                    <th scope="col" style="background: #CDA566;" >Thành Tiền</th>
                                    <th scope="col" style="background: #CDA566;" ></th>
                                    </tr>
                                </thead>
                                <tbody id="pro_search_append">
                                        
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row bill-action" style="background: #e0ded7">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 m-t-10">
                                        <textarea class="form-control" id="note-order" placeholder="Nhập ghi chú hóa đơn" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 m-t-10">
                                        <button type="button" style="height: 90px;" class="btn-print btn-danger" onclick="cms_save_table()"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh Toán </button>
                                    </div>
                                    <div class="col-md-6 col-xs-6 m-t-10">
                                        <button type="button" style="height: 90px; width: 130px;" class="btn-pay btn-success" onclick="cms_save_oder()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label class="col-form-label col-md-4"><b>Tổng cộng</b></label>
                                    <div class="col-md-8">
                                        <input type="text" value="0" class="form-control total-pay" disabled="disabled">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label col-md-4"><b>Khách Đưa</b></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control customer-pay" value="0" placeholder="Nhập số điền khách đưa">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label col-md-4"><b>Tiền thừa</b></label>
                                    <div class="col-md-8 excess-cash">
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        
                    
                    
                    <!-- Footer -->
                {{-- </div> --}}
                {{-- <footer class="footer">
                    <div class="footer-content">
                        <h3 class="m-b-0">For Coffe <span id="ec-year"></span></h3>
                        <span>
                            <a href="" class="text-gray m-r-15">Facebook</a>
                            <a href="" class="text-gray">Tik Tok</a>
                        </span>
                    </div>
                </footer> --}}
                <!-- Page Container END -->

            </div>
        </div>
    </body>

    <!-- common Javascript -->

    <!-- Core Vendors JS -->
    <script src=" {{ asset('assets/js/vendors.min.js') }} "></script>
    <!-- page js -->
    <script src=" {{ asset('assets/vendors/chartjs/Chart.min.js') }} "></script>
    <script src=" {{ asset('assets/js/pages/dashboard-default.js') }} "></script>
    <script src=" {{ asset('assets/js/pages/profile.js') }} "></script>
    <!-- Core JS -->
    <script src=" {{ asset('assets/js/app.min.js') }} "></script>

    <!-- custom js for page -->

</html>






{{-- orderr old --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enlink - Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.jpg') }}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

</head>

<body>

    <div style="height: 70px">
    </div>
    {{-- <div class="header-cashier">
		<div class="container-fluid">
			<div class="row ft-tabs">
				<div class="col-md-3">
					<ul class="tabs-list">
						<li><a href="#" class="active" data="listtable">Phòng Bàn</a></li>
						<li><a href="#" data="pos">Thực đơn</a></li>
					</ul>
				</div>
				<div class="col-md-4 cashier-search">
					<input type="text" name="txtnamemenu" id="search-menu" placeholder="Nhập tên mặt hàng" class="form-control">
					<div id="result-menu-post">
						
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="container-fluid">
		<div class="row content">
			<div class="col-md-6" id="table-list">
				<div class="row list-filter">
					<div class="col-md list-filter-content">
						
					</div>
				</div>
				<div class="row table-list">
					<div class="col-md table-list-content">
						<ul>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6" id="pos" hidden="true">
				<div class="row list-filter">
					<div class="col-md list-filter-content">
						<button class="btn btn-primary active" onclick="cms_load_cate(0);">Tất Cả</button>
						
						
					</div>
				</div>
				<div class="row product-list">
					<div class="col-md product-list-content">
						<ul>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6 content-listmenu" id="content-listmenu">
				<div class="row" id="bill-info">
					<div class="col-md-2 table-infor">
						
					</div>
					<div class="col-md-5">
						<div class="col-md-12 p-0 input-group">
							<input type="text" id="customer-infor" placeholder="Tìm khách hàng" class="form-control">
							<div class="input-group-append">
    							<button class="btn btn-primary" data-toggle="modal" data-target="#ModelAddcustomer"><i class="fa fa-plus" aria-hidden="true"></i></button>
  							</div>
							<div id="result-customer"></div>
							<span class="del-customer"></span>
						</div>
					</div>
					<div class="col-md-5">
						<select class="form-control">
							<option value="1">Bảng giá chung</option>
						</select>
					</div>
				</div>
				<div class="row bill-detail">
					<div class="col-md-12 bill-detail-content">
						<table class="table table-bordered">
						  <thead class="thead-light">
						    <tr>
						      <th scope="col">STT</th>
						      <th scope="col">Tên sản phẩm</th>
						      <th scope="col">Số lượng</th>
						      <th scope="col">Gía bán</th>
						      <th scope="col">Thành Tiền</th>
						      <th scope="col"></th>
						    </tr>
						  </thead>
						  <tbody id="pro_search_append">
						    	
						  </tbody>
						</table>
					</div>
				</div>
				<div class="row bill-action">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 p-1">
								<textarea class="form-control" id="note-order" placeholder="Nhập ghi chú hóa đơn" rows="3"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-6 p-1">
								<button type="button" class="btn-print" onclick="cms_save_table()"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh Toán (F9)</button>
							</div>
							<div class="col-md-6 col-xs-6 p-1">
								<button type="button" class="btn-pay" onclick="cms_save_oder()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu (F10)</button>
							</div>
						</div>
 					</div>
 					<div class="col-md-6">
 						<div class="row form-group">
							<label class="col-form-label col-md-4"><b>Tổng cộng</b></label>
							<div class="col-md-8">
								<input type="text" value="0" class="form-control total-pay" disabled="disabled">
							</div>
						</div>
						<div class="row form-group">
							<label class="col-form-label col-md-4"><b>Khách Đưa</b></label>
							<div class="col-md-8">
								<input type="text" class="form-control customer-pay" value="0" placeholder="Nhập số điền khách đưa">
							</div>
						</div>
						<div class="row form-group">
							<label class="col-form-label col-md-4"><b>Tiền thừa</b></label>
							<div class="col-md-8 excess-cash">
								0
							</div>
						</div>
 					</div>
				</div>
			</div>
		</div>
	</div> --}}



    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="index.html">
                        {{-- <img src="  {{ asset('assets/images/logo/logo.png') }}" alt="Logo"> --}}
                        {{-- <img class="logo-fold" src="{{ asset('assets/images/logo/logo-fold.png') }}" alt="Logo"> --}}
                        <h1 style="font-family: Steak;line-height: 75px ">FOR CAFE</h1>
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="index.html">
                        {{-- <img src=" {{ asset('assets/images/logo/logo-white.png') }} " alt="Logo">
                        <img class="logo-fold" src="{{ asset('assets/images/logo/logo-fold-white.png') }}" alt="Logo"> --}}
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
            
                        {{-- <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                        <small>View All</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-blue avatar-icon">
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You received a new message</p>
                                                    <p class="m-b-0"><small>8 min ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small>7 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-red avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">System Alert</p>
                                                    <p class="m-b-0"><small>8 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                            <div class="d-flex">
                                                <div class="avatar avatar-gold avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You have a new update</p>
                                                    <p class="m-b-0"><small>2 days ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
            
            
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{ asset('images/'.session()->get('inforUser')[0]->HinhAnh) }}"   alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="{{ asset('images/'.session()->get('inforUser')[0]->HinhAnh) }}"  alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">{{ session()->get('inforUser')[0]->TenNV }}</p>
                                            {{-- <p class="m-b-0 opacity-07">UI/UX Desinger</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('editUser', ['id'=>session()->get('inforUser')[0]->IDNhanVien]) }}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Cập nhật Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                {{-- <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Account Setting</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Projects</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a> --}}
                                <a href=" {{ route('login') }} " class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Đăng xuất</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                <i class="anticon anticon-appstore"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>   
            <!-- Header END -->



            <div class="container-fluid o-field">
                <div class="row mt-3 ml-3 mr-3">
                    <div class="col-lg-4">
                       <div class="card bg-dark border-primary">
                            <div class="card-header text-white  border-primary">
                                <b>Order List</b>
                            <span class="float:right"><a class="btn btn-primary btn-sm col-sm-3 float-right" href="../index.php" id="">
                                <i class="fa fa-home"></i> Home 
                            </a></span>
                            </div>
                           <div class="card-body">
                            <form action="" id="manage-order">
                                <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                                <div class="bg-white" id='o-list'>
                                            <div class="d-flex w-100 bg-dark mb-1">
                                                <label for="" class="text-white"><b>Order No.</b></label>
                                                <input type="number" class="form-control-sm" name="order_number" value="<?php echo isset($order_number) ? $order_number : '' ?>" required>
                                            </div>
                                <table class="table table-bordered bg-light" >
                                        <colgroup>
                                            <col width="20%">
                                            <col width="40%">
                                            <col width="40%">
                                            <col width="5%">
                                        </colgroup>
                                    <thead>
                                        <tr>
                                            <th>QTY</th>
                                            <th>Order</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data)
                                            {{-- <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <span class="btn btn-sm btn-secondary btn-minus"><b><i class="fa fa-minus"></i></b></span>
                                                        <input type="number" name="qty[]" id="" value=" 2 ">
                                                        <span class="btn btn-sm btn-secondary btn-plus"><b><i class="fa fa-plus"></i></b></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="item_id[]" id="" value=" ">
                                                    <input type="hidden" name="product_id[]" id="" value="{{ $data->IDSanPham }}">{{ $data->TenSP }}
                                                    <small class="psmall"> </small>
                                                </td>
                                                <td class="text-right">
                                                    <input type="hidden" name="price[]" id="" value="">
                                                    <input type="hidden" name="amount[]" id="" value="">
                                                    <span class="amount"></span>
                                                </td>
                                                <td>
                                                    <span class="btn btn-sm btn-danger btn-rem"><b><i class="fa fa-times text-white"></i></b></span>
                                                </td>
                                            </tr> --}}
                                            <script>
                                                $(document).ready(function(){
                                                qty_func()
                                                    calc()
                                                    cat_func();
                                                })
                                            </script>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <div class="d-block bg-white" id="calc">
                                    <table class="" width="100%">
                                        <tbody>
                                                <tr>
                                                <td><b><h4>Total</h4></b></td>
                                                <td class="text-right">
                                                    <input type="hidden" name="total_amount" value="0">
                                                    <input type="hidden" name="total_tendered" value="0">
                                                    <span class=""><h4><b id="total_amount">0.00</b></h4></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                           </div>
                       </div>
                    </div>
                    <div class="col-lg-8  p-field">
                        <div class="card border-primary">
                            <div class="card-header bg-dark text-white  border-primary">
                                <b>Products</b>
                            </div>
                            <div class="card-body bg-dark d-flex" id='prod-list'>
                                <div class="col-md-3">
                                    <div class="w-100 pr-0 bg-white" id="cat-list">
                                        <b>Category</b>
                                        <hr>
                                        <div class="card bg-primary mx-3 mb-2 cat-item" style="height:50px !important;align-items: flex-start;justify-content: center;" data-id = 'all'>
                                            <div class="card-body">
                                                <span><b class="text-white">
                                                    All
                                                </b></span>
                                            </div>
                                        </div>

                                        @foreach ($cate as $cate)
                                        <div class="card bg-primary mx-3 mb-2 cat-item" style="height:50px !important;align-items: flex-start;justify-content: center;" data-id = '{{ $cate->IDDanhMucSP}}'>
                                            <div class="card-body">
                                                <span><b class="text-white">
                                                    {{ $cate->TenDMSP }}
                                                </b></span>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <hr>
                                    <div class="row">
                                       @foreach ($products as $product)
                                        <div class="col-md-4 mb-2">
                                            <div class="card bg-primary prod-item"  data-json = '' data-category-id=" {{ $product->IDDanhMucSP }} " style="">
                                                <div class="card-body">
                                                    <span><b class="text-white">
                                                        {{ $product->TenSP }}
                                                    </b></span>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
                                    </div>
                                </div>   
                            </div>
                        <div class="card-footer bg-dark  border-primary">
                            <div class="row justify-content-center">
                                <div class="btn btn btn-sm col-sm-3 btn-primary mr-2" type="button" id="pay">Pay</div>
                                <div class="btn btn btn-sm col-sm-3 btn-primary" type="button" id="save_order">Pay later</div>
                            </div>
                        </div>
                        </div>      			
                    </div>
                </div>
            </div>


            <script>
                var total;
                cat_func();
               $('#prod-list .prod-item').click(function(){
                    var data = $(this).attr('data-json')
                        data = JSON.parse(data)
                    if($('#o-list tr[data-id="'+data.id+'"]').length > 0){
                        var tr = $('#o-list tr[data-id="'+data.id+'"]')
                        var qty = tr.find('[name="qty[]"]').val();
                            qty = parseInt(qty) + 1;
                            qty = tr.find('[name="qty[]"]').val(qty).trigger('change')
                            calc()
                        return false;
                    }
                    var tr = $('<tr class="o-item"></tr>')
                    tr.attr('data-id',data.id)
                    tr.append('<td><div class="d-flex"><span class="btn btn-sm btn-secondary btn-minus"><b><i class="fa fa-minus"></i></b></span><input type="number" name="qty[]" id="" value="1"><span class="btn btn-sm btn-secondary btn-plus"><b><i class="fa fa-plus"></i></b></span></div></td>') 
                    tr.append('<td><input type="hidden" name="item_id[]" id="" value=""><input type="hidden" name="product_id[]" id="" value="'+data.id+'">'+data.name+' <small class="psmall">('+(parseFloat(data.price).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))+')</small></td>') 
                    tr.append('<td class="text-right"><input type="hidden" name="price[]" id="" value="'+data.price+'"><input type="hidden" name="amount[]" id="" value="'+data.price+'"><span class="amount">'+(parseFloat(data.price).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))+'</span></td>') 
                    tr.append('<td><span class="btn btn-sm btn-danger btn-rem"><b><i class="fa fa-times text-white"></i></b></span></td>')
                    $('#o-list tbody').append(tr)
                    qty_func()
                    calc()
                    cat_func();
               })
                function qty_func(){
                     $('#o-list .btn-minus').click(function(){
                        var qty = $(this).siblings('input').val()
                            qty = qty > 1 ? parseInt(qty) - 1 : 1;
                            $(this).siblings('input').val(qty).trigger('change')
                            calc()
                     })
                     $('#o-list .btn-plus').click(function(){
                        var qty = $(this).siblings('input').val()
                            qty = parseInt(qty) + 1;
                            $(this).siblings('input').val(qty).trigger('change')
                            calc()
                     })
                     $('#o-list .btn-rem').click(function(){
                        $(this).closest('tr').remove()
                        calc()
                     })
                     
                }
                function calc(){
                     $('[name="qty[]"]').each(function(){
                        $(this).change(function(){
                            var tr = $(this).closest('tr');
                            var qty = $(this).val();
                            var price = tr.find('[name="price[]"]').val()
                            var amount = parseFloat(qty) * parseFloat(price);
                                tr.find('[name="amount[]"]').val(amount)
                                tr.find('.amount').text(parseFloat(amount).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
                            
                        })
                     })
                     var total = 0;
                     $('[name="amount[]"]').each(function(){
                        total = parseFloat(total) + parseFloat($(this).val()) 
                     })
                        console.log(total)
                    $('[name="total_amount"]').val(total)
                    $('#total_amount').text(parseFloat(total).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
                }
               function cat_func(){
                $('.cat-item').click(function(){
                        var id = $(this).attr('data-id')
                        console.log(id)
                        if(id == 'all'){
                            $('.prod-item').parent().toggle(true)
                        }else{
                            $('.prod-item').each(function(){
                                if($(this).attr('data-category-id') == id){
                                    $(this).parent().toggle(true)
                                }else{
                                    $(this).parent().toggle(false)
                                }
                            })
                        }
                })
               }
               $('#save_order').click(function(){
                $('#tendered').val('').trigger('change')
                $('[name="total_tendered"]').val('')
                $('#manage-order').submit()
               })
               $("#pay").click(function(){
                start_load()
                var amount = $('[name="total_amount"]').val()
                if($('#o-list tbody tr').length <= 0){
                    alert_toast("Please add atleast 1 product first.",'danger')
                    end_load()
                    return false;
                }
                $('#apayable').val(parseFloat(amount).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
                $('#pay_modal').modal('show')
                setTimeout(function(){
                    $('#tendered').val('').trigger('change')
                    $('#tendered').focus()
                    end_load()
                },500)
                
               })
               $('#tendered').keyup('input',function(e){
                    if(e.which == 13){
                        $('#manage-order').submit();
                        return false;
                    }
                    var tend = $(this).val()
                        tend =tend.replace(/,/g,'') 
                    $('[name="total_tendered"]').val(tend)
                    if(tend == '')
                        $(this).val('')
                    else
                        $(this).val((parseFloat(tend).toLocaleString("en-US")))
                    tend = tend > 0 ? tend : 0;
                    var amount=$('[name="total_amount"]').val()
                    var change = parseFloat(tend) - parseFloat(amount)
                    $('#change').val(parseFloat(change).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
               })
               
                $('#tendered').on('input',function(){
                    var val = $(this).val()
                    val = val.replace(/[^0-9 \,]/, '');
                    $(this).val(val)
                })
                $('#manage-order').submit(function(e){
                    e.preventDefault();
                    start_load()
                    $.ajax({
                        url:'../ajax.php?action=save_order',
                        method:'POST',
                        data:$(this).serialize(),
                        success:function(resp){
                            if(resp > 0){
                                if($('[name="total_tendered"]').val() > 0){
                                    alert_toast("Data successfully saved.",'success')
                                    setTimeout(function(){
                                        var nw = window.open('../receipt.php?id='+resp,"_blank","width=900,height=600")
                                        setTimeout(function(){
                                            nw.print()
                                            setTimeout(function(){
                                                nw.close()
                                                location.reload()
                                            },500)
                                        },500)
                                    },500)
                                }else{
                                    alert_toast("Data successfully saved.",'success')
                                    setTimeout(function(){
                                        location.reload()
                                    },500)
                                }
                            }
                        }
                    })
                })
            </script>









            <!-- Side Nav START -->
            {{-- <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                    </ul>
                </div>
            </div> --}}
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    {{-- <div class="page-header">
                        <h2 class="header-title">Blog Grid</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="#">Pages</a>
                                <span class="breadcrumb-item active">Blog Grid</span>
                            </nav>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="assets/images/others/img-2.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="m-t-10">You Should Know About Enlink</h4>
                                            <p class="m-b-20">Jelly-o sesame snaps halvah croissant oat cake cookie. Cheesecake bear claw topping. Chupa...</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>
                                                <a class="text-primary btn btn-sm btn-hover" href="blog-post.html">
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center m-t-5">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span class="font-weight-semibold">Darryl Day</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="assets/images/others/img-3.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="m-t-10">Enlink Has The Answer</h4>
                                            <p class="m-b-20">Efficiently unleash cross-media information without cross-media value. Quickly maximize ti...</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>
                                                <a class="text-primary btn btn-sm btn-hover" href="blog-post.html">
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center m-t-5">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span class="font-weight-semibold">Marshall Nichols</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="assets/images/others/img-4.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="m-t-10">The Miracle Of Enlink</h4>
                                            <p class="m-b-20">Climb leg rub face on everything give attitude nap all day for under the bed. Chase mice a...</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>
                                                <a class="text-primary btn btn-sm btn-hover" href="blog-post.html">
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center m-t-5">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span class="font-weight-semibold">Virgil Gonzales</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="assets/images/others/img-5.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="m-t-10">Enlink Has The Answer</h4>
                                            <p class="m-b-20">European minnow priapumfish mosshead warbonnet shrimpfish bigscale. Cutlassfish porbeagle ...</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 2, 2019</p>
                                                <a class="text-primary btn btn-sm btn-hover" href="blog-post.html">
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center m-t-5">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-5.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span class="font-weight-semibold">Nicole Wyne</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="assets/images/others/img-6.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="m-t-10">Seven Clarifications On Hand</h4>
                                            <p class="m-b-20">Let’s see what Chef Dee got that they don’t want us to eat. Let me be clear, you have to m...</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 3, 2019</p>
                                                <a class="text-primary btn btn-sm btn-hover" href="blog-post.html">
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center m-t-5">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span class="font-weight-semibold">Riley Newman</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="assets/images/others/img-7.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="m-t-10">The Modern Rules</h4>
                                            <p class="m-b-20">The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and i...</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="m-b-0 text-dark font-weight-semibold font-size-15">Jan 3, 2019</p>
                                                <a class="text-primary btn btn-sm btn-hover" href="blog-post.html">
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center m-t-5">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span class="font-weight-semibold">Pamela Wanda</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="side-nav">
                                <div class="side-nav-inner">
                                    <ul class="side-nav-menu scrollable">
                                    </ul>
                                </div>
                            </div> --}}
                                <!-- Side Nav END -->
                        </div>
                    </div>
                    <div class="m-t-30">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Content Wrapper END -->

            </div>
            <!-- Page Container END -->
            
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>