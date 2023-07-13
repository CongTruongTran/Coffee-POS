<div  class="side-nav">
    <div class="side-nav-inner">
        <ul  class=" side-nav-menu scrollable">

            {{-- @if (isset($_SESSION['user_is_admin']))              --}}
            <li  class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-chart-pie"></i>
                    </span>
                    <span class="title">Thống kê</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ session('active') === 'dashboard' ? 'active':'' }}">
                        <a href= {{ route('dashboard') }}>Thống kê</a>
                    </li>                 
                </ul>
            </li>
            {{-- @endif --}}

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-read"></i>
                    </span>
                    <span class="title">Thực đơn</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ session('active') === 'productListView' ? 'active':'' }}">
                        <a href=" {{ route('productList') }} ">Danh sách món</a>
                    </li>
                    <li class="{{ session('active') === 'productAdd' ? 'active':'' }}" >
                        <a href=" {{ route('addProduct') }} ">Thêm món</a>
                    </li>
                </ul>
            </li>  
             
            <li  class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="far fa-clone"></i>
                    </span>
                    <span class="title">Danh mục</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    {{-- <li class="active"> và class active --}}
                    <li class="{{ session('active') === 'categoryListView' ? 'active':'' }}">
                        <a href= {{ route('categoryList') }}>Danh sách danh mục</a>
                    </li>
                    <li class="{{ session('active') === 'categoryAdd' ? 'active':'' }}">
                        <a href={{ route('addCategory') }}>Thêm danh mục</a>
                    </li>
                    
                </ul>
            </li>  
            

            <li  class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-book"></i>
                    </span>
                    <span class="title">Đơn hàng</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ session('active') === 'orderListView' ? 'active':'' }}">
                        <a href= {{ route('orderList') }}>Danh sách đơn hàng</a>
                    </li>
                    
                </ul>
            </li>
                

            {{-- @if( {{ session()->get('inforUser')[0]->IDQuyen }} == 2 ) --}}
             <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-home"></i>
                    </span>
                    <span class="title">Nhà cung cấp</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ session('active') === 'supplierListView' ? 'active':'' }}">
                        <a href=" {{ route('supplierList') }}">Danh sách nhà cung cấp</a>
                    </li>
                    <li class="{{ session('active') === 'supplierAdd' ? 'active':'' }}" >
                        <a href=" {{ route('addSupplier') }} ">Thêm nhà cung cấp</a>
                    </li>
                </ul>
            </li>
            {{-- @endif() --}}


            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-warehouse"></i>
                    </span>
                    <span class="title">Kho hàng</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ session('active') === 'wareHouseListView' ? 'active':'' }}">
                        <a href=" {{ route('warehouseList') }}">Hàng hóa</a>
                    </li>
                    <li class="{{ session('active') === 'warehouseInput' ? 'active':'' }}" >
                        <a href=" {{ route('inputWarehouse') }} ">Nhập hàng</a>
                    </li>
                    <li class="{{ session('active') === 'wareHouseHistoryListView' ? 'active':'' }}" >
                        <a href=" {{ route('warehouseHistory') }} ">Lịch sử nhập hàng</a>
                    </li>
                    
                </ul>
            </li>     

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-user-friends"></i>
                    </span>
                    <span class="title">Người dùng</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ session('active') === 'userListView' ? 'active':'' }}">
                        <a href=" {{ route('userList') }} ">Danh sách người dùng</a>
                    </li>
                    <li class="{{ session('active') === 'userAdd' ? 'active':'' }}">
                        <a href="{{ route('addUser') }}">Thêm người dùng</a>
                    </li>
                </ul>
            </li>
            

    </div>
</div>