<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home/{category}/{article}', function($c, $a){
//     $name = 'riad';
//     return view('test',['category' => $c, 'article'=>$a]);
// });
// Route::get('/history/{category}', [HistoryController::class, 'home']);

//dasboard
Route::get('/', [EmployeeController::class, 'dash']);


//authentication-authorization
Route::get('/login', [EmployeeController::class, 'login']);
Route::post('/store-login', [AuthController::class, 'storeLogin']);

Route::middleware(['IsLoggedIn', 'IsAdminLogged'])->group(function () {
    Route::get('adminhome', [AuthController::class, 'adminhome']);
    //CRUD
    Route::get('insert', [EmployeeController::class, 'insert']);
    Route::post('store-employee', [EmployeeController::class, 'store']);
    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('update/{id}', [EmployeeController::class, 'update']);
    Route::get('delete/{id}', [EmployeeController::class, 'delete']);
});
Route::middleware(['IsLoggedIn', 'IsEmployeeLogged'])->group(function () {
    Route::get('employeehome', [AuthController::class, 'employeehome']);
    Route::get('products', [ProductController::class, 'all']);
    Route::get('upload', [UploadController::class, 'upload']);
    Route::post('upload-image', [UploadController::class, 'uploadImage']);
});
Route::get('logout', [AuthController::class, 'logout']);



//Layouting
Route::get('/index', [LayoutController::class, 'index']);
Route::get('/sb_login', [LayoutController::class, 'sb_login']);
Route::get('/sb_register', [LayoutController::class, 'sb_register']);
Route::get('/sb_password', [LayoutController::class, 'sb_password']);
Route::get('/sb_chart', [LayoutController::class, 'sb_chart']);
Route::get('/sb_table', [LayoutController::class, 'sb_table']);
Route::get('/sb_static', [LayoutController::class, 'sb_static']);
Route::get('/sb_401', [LayoutController::class, 'sb_401']);
Route::get('/sb_404', [LayoutController::class, 'sb_404']);
Route::get('/sb_500', [LayoutController::class, 'sb_500']);

