<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/authen',[LoginController::class,'getLogin'])->name('authen');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');


// Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/export_dashboard_user',[DashboardController::class,'export_dashboard_user'])->name('export_dashboard_user');
        Route::get('/export_dashboard_product',[DashboardController::class,'export_dashboard_product'])->name('export_dashboard_product');
    });
    
    // route category
    Route::prefix('category')->group(function() {
        Route::get('/categorylist', [CategoryController::class, 'index'])->name('categoryList');

        Route::get('/addcategory', [CategoryController::class, 'create'])->name('addCategory');
        Route::post('/addcategory', [CategoryController::class, 'store']);

        Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
        Route::post('/updatecategory', [CategoryController::class, 'update'])->name('updateCategory');
        
        Route::get('/deleteCategory/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');
    });

    // route product
    Route::prefix('product')->group( function (){
        Route::get('/productlist', [ProductController::class , 'index'])->name('productList'); 
        Route::get('/export_product', [ProductController::class , 'export_product'])->name('export_product'); 
        
        Route::get('/addproduct', [ProductController::class, 'create'])->name('addProduct');
        Route::post('/addproduct', [ProductController::class, 'store']);

        Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('editProduct');
        Route::post('/updateproduct', [ProductController::class, 'update'])->name('updateProduct');

        Route::get('/deleteproduct/{id}', [ProductController::class, 'delete'])->name('deleteProduct');
    });
    

    // route supplier
    Route::prefix('supplier')->group( function (){
        Route::get('/supplierlist', [SupplierController::class , 'index'])->name('supplierList');

        Route::get('/addsupplier', [SupplierController::class, 'create'])->name('addSupplier');
        Route::post('/addsupplier', [SupplierController::class, 'store']);

        Route::get('/editsupplier/{id}', [SupplierController::class, 'edit'])->name('editSupplier');
        Route::post('/updatesupplier', [SupplierController::class, 'update'])->name('updateSupplier');

        Route::get('/deletesupplier/{id}', [SupplierController::class, 'delete'])->name('deleteSupplier');
    });

    // route user
    Route::prefix('user')->group( function (){
        Route::get('/userlist', [UserController::class , 'index'])->name('userList');

        Route::get('/adduser', [UserController::class, 'create'])->name('addUser');
        Route::post('/adduser', [UserController::class, 'store']);

        Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('editUser');
        Route::post('/updateuser', [UserController::class, 'update'])->name('updateUser');

        // Route::get('/deleteuser/{id}', [UserController::class, 'delete'])->name('deleteUser');

        // Route::get('/userprofile/{id}',[UserController::class,'showProfile'])->name('userProfile');
    });

    // route order
    Route::prefix('order')->group( function (){
        Route::get('/orderlist', [OrderController::class , 'index'])->name('orderList');

        Route::get('/order', [OrderController::class, 'create'])->name('Order');
        Route::post('/order', [OrderController::class, 'store']);

        Route::get('/editorder/{id}', [OrderController::class, 'edit'])->name('editOrder');
        Route::post('/updateorder', [OrderController::class, 'update'])->name('updateOrder');

        // Route::get('/deleteorder/{id}', [OrderController::class, 'delete'])->name('deleteOrder');

        Route::get('/orderdetail/{id}',[OrderController::class,'showDetail'])->name('orderDetail');
        Route::get('/export_orderdetail/{id}',[OrderController::class,'export_orderdetail'])->name('export_orderdetail');
    });

    // rourte warehouse
    Route::prefix('warehouse')->group( function (){
        Route::get('/warehouselist', [WarehouseController::class , 'index'])->name('warehouseList');
        Route::post('/warehouselist', [WarehouseController::class , 'add'])->name('addWarehouse');

        Route::get('/inputwarehouse', [WarehouseController::class, 'create'])->name('inputWarehouse');
        Route::post('/inputwarehouse', [WarehouseController::class, 'store']);

        Route::get('/editwarehouse/{id}', [WarehouseController::class, 'edit'])->name('editWarehouse');
        Route::post('/updatewarehouse', [WarehouseController::class, 'update'])->name('updateWarehouse');

        // history warehouse
        Route::get('/historywarehouse', [WarehouseController::class , 'showHistory'])->name('warehouseHistory');
        Route::get('/export_historywarehouse', [WarehouseController::class , 'export_historywarehouse'])->name('export_historywarehouse');

        Route::get('/edithistorywarehouse/{id}', [WarehouseController::class, 'editHistory'])->name('editHistoryWarehouse');
        Route::post('/updatehistorywarehouse', [WarehouseController::class, 'updateHistory'])->name('updateHistoryWarehouse');

        // hk cần xóa -> update số lượng về 0 là oke
        // Route::get('/deletewarehouse/{id}', [WarehouseController::class, 'delete'])->name('deletewarehouse');
    });




    
    // test route

    Route::get('/demo', function(){
        return view('pages.demo');
    });


// });