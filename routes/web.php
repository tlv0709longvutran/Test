<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Response;
use App\Http\Controllers\UsersController;

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

// Client Route
// Route::get('/' ,[HomeController::class , 'index'])->name('home')->middleware('auth.admin');

// Route::middleware('auth.admin')->prefix('categories')->group(function(){
//     // Danh sách chuyên mục
//     Route::get('/',[CategoriesController::class , 'index'])->name('categories.list');

//     // Lấy chi tiết 1 chuyên mục(Ap dụng show form sửa chuyên mục)
//     Route::get('/edit/{id}',[CategoriesController::class , 'getCategory'])->name('categories.edit');

//     // Xử lý update chuyên mục
//     Route::post('/edit/{id}',[CategoriesController::class , 'updateCategory']);

//     // Hiển thị form add dữ liệu
//     Route::get('/add' , [CategoriesController::class , 'addCategory'])->name('categories.add');

//     // Xử lý thêm chuyên mục
//     Route::post('/add',[CategoriesController::class , 'handleCategory']);

//     //Xóa chuyên mục
//     Route::delete('/delete/{id}' ,[CategoriesController::class , 'deleteCategory'])->name('categories.delete');
// });

// Route::get('san-pham/{id}',[HomeController::class , 'getProductDetail']);

// Route::middleware('auth.admin')->prefix('admin')->group(function(){
//     Route::get('/', [DashboardController::class , 'index']);
//     Route::middleware('auth.admin.product')->resource('product' , ProductsController::class);
// });

Route::get('/' , [HomeController::class , 'index'])->name('home');

Route::get('/san-pham' , [HomeController::class , 'product'])->name('products');

Route::get('/tin-tuc' , [HomeController::class , 'news'])->name('news');

Route::get('/lien-he' , [HomeController::class , 'contact'])->name('contact');

Route::get('/dich-vu' , [HomeController::class , 'service'])->name('service');

Route::get('/gioi-thieu' , [HomeController::class , 'recommand'])->name('recommand');

Route::get('/them-san-pham' , [HomeController::class , 'getAdd']);

Route::post('/them-san-pham' , [HomeController::class , 'postAdd'])->name('post-add');

Route::put('/them-san-pham' , [HomeController::class , 'putAdd']);

Route::get('/demo-response' , function() {
   return view('Client.demo-test')-> name('demo-response');


});

Route::post('/demo-response' , function(Request $request) {
    if(!empty($request->username)){
        return back()->withInput();
    }

    return redirect(route('demo-response'))->with('mess','Validate Khong thanh cong');
 });

 Route::get('/download-image',[HomeController::class , 'downloadImage'])->name('downloadImage') ;

// Nguoi dung

Route::prefix('users')->name('users.')->group(function(){
    Route::get('/',[UsersController::class , 'index'])->name('index');

    Route::get('add',[UsersController::class , 'add'])->name('add');

    Route::post('add',[UsersController::class , 'postAdd'])->name('post-add');

    Route::get('/edit/{id}' ,[UsersController::class , 'getEdit'] )->name('edit');

    Route::post('/update}' ,[UsersController::class , 'postEdit'] )->name('post-edit');

    Route::get('/delete/{id}' ,[UsersController::class , 'delete'] )->name('delete');


});



