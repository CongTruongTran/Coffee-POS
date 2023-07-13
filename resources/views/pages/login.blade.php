<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login For Coffe</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href=" {{ asset('assets/images/logo/logo.jpg') }} ">

    <!-- page css -->

    <!-- Core css -->
    <link href=" {{ asset('assets/css/app.min.css') }} " rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height">
                <div class="col-lg-4 d-none d-lg-flex bg" style="background-image:url('assets/images/others/login-cafe1.jpg')">
                    <div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-center">
                        {{-- <div class="">
                            <img src="assets/images/logo/logo1.jpg" alt="">
                        </div> --}}
                        <div>
                            <h1 class="text-black m-b-20 font-weight-normal">For Coffe</h1>
                            <p class="text-black font-size-16 lh-2 w-80 opacity-08">
                                Khởi động ngày mới với một ly cà phê</p>
                        </div>
                        {{-- <div class="d-flex justify-content-between">
                            <span class="text-white d-none">© 2019 ThemeNate</span>
                            <ul class="list-inline d-none">
                                <li class="list-inline-item">
                                    <a class="text-white text-link" href="">Legal</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-white text-link" href="">Privacy</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div style="background: #CDC9C9 !important" class="col-lg-8 bg-white">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div style="background: #CDA566 !important;padding: 50px;border-radius: 15px;"  class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <h1>Đăng Nhập</h1>
                                <p class="m-b-30">nhập thông tin tài khoản của bạn</p>
                                <form method="POST" action="{{ route('authen') }}">
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">tên đăng nhập:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input name="email" type="text" class="form-control" id="userName" placeholder="tên đăng nhập...">
                                        </div>
                                        @error('email')
                                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">mật khẩu:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input name="password" type="password" class="form-control" id="password" placeholder="mật khẩu...">
                                        </div>
                                        @error('password')
                                            <span style="color:red;display: block;margin-bottom: 10px; ">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button class="btn btn-primary">Đăng Nhập</button>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Core Vendors JS -->
    <script src=" {{ asset('assets/js/vendors.min.js') }} "></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src=" {{ asset('assets/js/app.min.js') }} "></script>

</body>

</html>