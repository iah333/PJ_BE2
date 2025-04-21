<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SanPhamController; 
use App\Http\Controllers\DanhMucSanPhamController; 

//Trang chủ
Route::get('/', function () {
    return view('welcome');
})->name('home');
//Middleware Auth
Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'auth.login'], function() {
        Route::get('admin', function () {
            return view('admin.dashboard');
        })->name('admin');     
        // Thêm route sản phẩm và danh mục vào middleware auth
    Route::resource('danh-muc', DanhMucSanPhamController::class)->names('danhMuc');
    Route::resource('san-pham', SanPhamController::class)->names('sanPham');   
    });
});
Route::get('login',[LoginController::class, 'Showlogin'])->name('showlogin');
Route::post('login',[LoginController::class, 'Login'])->name('login');

//Đăng kí
Route::get('register', function() {
    return view('auth.register');
});
Route::post('register', [LoginController::class, 'register'])->name('register');


//Logout
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

//Detail User
Route::get('detailsuser', [LoginController::class, 'detailsUser'])->name('detailsUser');

Route::get('listUser', [LoginController::class, 'listUser'])->name('listUser');

Route::get('admin/update', [LoginController::class, 'showupdatea'])->name('showupdatea');
Route::post('admin/update', [LoginController::class, 'updateadmin'])->name('updateadmin');


