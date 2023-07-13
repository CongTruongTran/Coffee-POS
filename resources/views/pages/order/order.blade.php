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
        <style> 
            .show{
                display: block !important;
            }
        </style>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                
                <!-- Header START -->
                <div class="header">
                    <div class="logo logo-dark">
                        <a href=" {{ route('Order') }} ">
                            <h1 style="font-family: Steak;line-height: 75px ">FOR CAFE</h1>
                        </a>
                    </div>
                    <div class="logo logo-white">
                        <a href=" {{ route('Order') }} ">
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
                                <form action="" method="get" class="form-inline">
                                    <div class="form-group">
                                        <input value="{{old('key')}}" type="text" name="key" class="form-control" placeholder="Search..">
                                    </div> 
                                    <button type="submit" class="btn btn-primary">
                                        <i class="prefix-icon anticon anticon-search"></i>                                    
                                    </button>                                 
                                </form>
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
                                    <a href="{{ route('Order') }}" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon anticon-book"></i>
                                                <span class="m-l-10">Tạo đơn hàng</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                    @if (isset($_SESSION['user_is_admin']))             
                                    <a href="{{ route('dashboard')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="fas fa-chart-pie"></i>
                                                <span class="m-l-10">Dashboard</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                    @endif
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
                    <div class="row" style="height: 90vh">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="w-100 pr-0 bg-white" id="cat-list">
                                        <a href=" {{ route('Order') }} ">
                                        <button class="card mx-3 mb-2 cat-item" onclick="filterObjects('all')" style="background: #CDA566;height:auto !important;border-radius: 10px; width: 100%;" data-id = 'all'>
                                                <div class="card-body">
                                                    <span><b class="text-white">
                                                        All
                                                    </b></span>
                                                </div>
                                            </button>
                                        </a>
                                        @foreach ($cates as $cate)                                          
                                            <button class=" card mx-3 mb-2 cat-item" onclick="filterObjects('filter{{ $cate->IDDanhMucSP }}')" style="background: #CDA566;height:auto !important;border-radius: 10px; width: 100%;" data-id = '{{ $cate->IDDanhMucSP}}'>
                                                <div class="card-body">
                                                    <span><b class="text-white">
                                                        {{ $cate->TenDMSP }}
                                                    </b></span>
                                                </div>
                                            </button>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row" >

                                        @foreach ($products as $product)                  
                                            <div class="box filter{{ $product->IDDanhMucSP }} col-md-4" style="display: none"  onclick="selectProduct(this)">
                                                <div class="card">
                                                    <img class="card-img-top" src="{{ asset('images/'.$product->HinhAnh) }}" alt="" style="height: 125px;width: 190px;">
                                                    <div class="p-10" >
                                                        <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >{{ $product->TenSP }} </h5>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <p class="price m-b-0 text-dark font-weight-semibold font-size-15 product_price" id="price">
                                                                {{ $product->Gia}}
                                                            </p>                                                   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                    <div class="row" >

                                        @foreach ($productOutOfStock as $product)                  
                                            <div class="box filter{{ $product->IDDanhMucSP }} col-md-4" style="display: none"  onclick="selectProduct(this)">
                                                <div class="card">
                                                    <img class="card-img-top" src="{{ asset('images/'.$product->HinhAnh) }}" alt="" style="height: 125px;width: 190px;filter: grayscale(100%);">
                                                    <div class="p-10" >
                                                        <h5 class="" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;" >{{ $product->TenSP }} </h5>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <p class="price m-b-0 text-dark font-weight-semibold font-size-15 product_price" id="price">
                                                                {{ $product->Gia}}
                                                            </p>                                                   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" style="display: flex;justify-content: space-between !important;flex-direction: column;padding-bottom: 20px;max-height: 90vh;">
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
                                            {{-- <tr>
                                                <td>1</td>
                                                <td>a</td>
                                                <td>b</td>
                                                <td>c</td>
                                                <td>d</td>
                                                <td>e</td>
                                            </tr> --}}
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
                                            <button type="button" style="height: 90px; border-radius: 5px;" class="btn-print btn-danger" onclick="cms_save_table()"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh Toán </button>
                                        </div>
                                        <div class="col-md-6 col-xs-6 m-t-10">
                                            <button type="button" style="height: 90px; width: 130px;border-radius: 5px;" class="btn-pay btn-success" onclick="cms_save_oder()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu </button>
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

    <script>
        var prices = $('.product_price');
        for(let i = 0;i<prices.length;i++){
            prices[i].innerText = parseInt(prices[i].innerText).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }
    </script>

    <script>
        filterObjects("all");

        function filterObjects(c){
            var x, i;
            x = document.getElementsByClassName("box");
            console.log(x);
            if(c == "all") 
                c = "";
            for(i = 0; i <x.length; i++){
                removeClass(x[i], "show");
                if(x[i].className.indexOf(c) > -1) 
                    addClass(x[i], "show")
            }  
        }

        function addClass(element, name){
            var i, arr1, arr2 ;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for(i= 0; i < arr2.length; i++){
                if(arr1.indexOf(arr2[i]) == -1){
                    element.className += " " + arr2[i];
                }
            }
        }

        function removeClass(element, name){
            var i, arr1, arr2 ;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for(i= 0; i < arr2.length; i++){
                while(arr1.indexOf(arr2[i]) > -1){
                    arr1.splice(arr1.indexOf(arr2[i], 1));
                }
            }
            element.className = arr1.join(" ");
        }


        // $id = ${'price'}
        // console.log($id);

        </script>

        <script>
            function selectProduct(element) {
                element.classList.toggle("selected");
                var productName = element.innerHTML;

                console.log(productName);

                var selectedProducts = document.getElementById("pro_search_append");
                var listItem = document.createElement("<tr></tr>");
                listItem.innerHTML = productName;

                if (element.classList.contains("selected")) {
                selectedProducts.appendChild(listItem);
                } else {
                selectedProducts.removeChild(listItem);
                }
            }
        </script>
</html>