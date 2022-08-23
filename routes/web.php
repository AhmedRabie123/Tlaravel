<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\calculateController;
use App\Http\Controllers\MailController;
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

// route::get('/', [StudentController::class, 'home'])->name('home.page');
// route::get('/about', [StudentController::class, 'about'])->name('about.page');

// Route::group(['prefix'=>'location'], function(){

//     route::get('city', function(){

//         echo 'usa';

//     });

//     route::get('country', function(){

//         echo 'new york';

//     });

//     route::get('zip', function(){

//         echo '0124585';

//     });

// });



// route::middleware(['price'])->group(function(){

//     route::get('item1', function () {

//         echo 'item 1 price';
//     });

//     route::get('item2', function () {

//         echo 'item 2 price';
//     });

// });

//Route::get('student/add', [StudentController::class, 'add'])->name('student.add');

// Route::get('add', [StudentController::class, 'add'])->name('add.data');
// Route::get('view', [StudentController::class, 'view'])->name('view.data');
// Route::get('update', [StudentController::class, 'update'])->name('update.data');
// Route::get('delete', [StudentController::class, 'delete'])->name('delete.data');
// Route::get('all/student', [StudentController::class, 'all_student'])->name('all.student');


Route::get('/', [StudentController::class, 'index'])->name('home');
Route::post('store', [StudentController::class, 'store'])->name('store');
Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::post('update/{id}', [StudentController::class, 'update'])->name('update');
Route::get('delete/{id}', [StudentController::class, 'delete'])->name('delete');
Route::get('trashed', [StudentController::class, 'trashed'])->name('trashed');
Route::get('restore/{id}', [StudentController::class, 'restore'])->name('restore');
Route::get('force-delete/{id}', [StudentController::class, 'force_delete'])->name('force.delete');

// helper function

Route::get('check/{mark}', [calculateController::class, 'get_result'])->name('helper');

// send email

Route::get('send_email', [MailController::class, 'mail_send'])->name('send.email');

// route the authentication

Route::get('/home', [AuthController::class, 'index'])->name('home');
Route::get('/dashboard-user', [AuthController::class, 'dashboard_user'])->name('dashboard_user')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-submit', [AuthController::class, 'login_submit'])->name('login_submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registers'])->name('register');
Route::get('/forget-password', [AuthController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password-submit', [AuthController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}', [AuthController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password_submit', [AuthController::class, 'reset_password_submit'])->name('reset_password_submit');
Route::post('/registration_submit', [AuthController::class, 'registration_submit'])->name('registration_submit');
Route::get('/registration/verify/{token}/{email}', [AuthController::class, 'registration_verify'])->name('registration_verify');

// Admin Route

Route::get('/admin/login', [AdminController::class, 'admin_login'])->name('admin_login');
Route::post('/admin/login-submit', [AdminController::class, 'admin_login_submit'])->name('admin_login_submit');
Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard')->middleware('admin:admin');
Route::get('/admin/settings', [AdminController::class, 'admin_setting'])->name('admin_setting')->middleware('admin:admin');
Route::get('/admin/logout', [AdminController::class, 'admin_logout'])->name('admin_logout');
