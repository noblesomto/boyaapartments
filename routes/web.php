<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\FlutterController;


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


Route::get('/', [PageController::class, 'index']);
Route::get('/about-us', [PageController::class, 'about']);
Route::get('/how-it-works', [PageController::class, 'how_it_works']);
Route::get('/contact-us', [PageController::class, 'contact']);
Route::get('/email', [PageController::class, 'email']);
Route::get('/booking/{id}', [PageController::class, 'booking']);


//Account Section
Route::any('/adminlogin', [PageController::class, 'adminlogin']);
Route::any('/login', [PageController::class, 'login']);
Route::any('/register', [PageController::class, 'register']);
Route::get('/verifyaccount/{id}/{token}', [PageController::class, 'verifyaccount']);
Route::any('/forgot-password', [PageController::class, 'forgot_password']);
Route::any('/reset-password/{id}/{token}', [PageController::class, 'reset_password']);

Route::get('/rooms', [RoomController::class, 'rooms']);
Route::any('/search-rooms', [RoomController::class, 'search_rooms']);
Route::any('/room/{id}/{slug}', [RoomController::class, 'room']);
Route::any('/book/{id}', [RoomController::class, 'book']);
Route::any('/book-apartment/{id}', [RoomController::class, 'book_apartment']);
Route::any('/book-apartment-2/{id}', [RoomController::class, 'book_apartment_2']);
Route::get('/book_apartment_3/{id}/{order}', [RoomController::class, 'book_apartment_3'])->middleware('usersession');

// Paystack controller
//Route::any('/pay', [PaystackController::class, 'redirectToGateway'])->name('pay');
//Route::any('/make-payment', [PaystackController::class, 'make_payment'])->name('makepayment');
//Route::get('/payment/callback', [PaystackController::class, 'handleGatewayCallback'])->name('payment');

Route::post('/pay', [FlutterController::class, 'initialize'])->name('pay');
Route::get('/rave/callback', [FlutterController::class, 'callback'])->name('callback');


//User Dashboard Section
Route::get('/user/index', [UserController::class, 'index'])->name('user.index')->middleware('usersession');
Route::any('/user/profile', [UserController::class, 'profile'])->middleware('usersession');
Route::any('/user/orders', [UserController::class, 'orders'])->middleware('usersession');
Route::get('/user/logout', [UserController::class, 'logout'])->middleware('usersession');



//Admin Section
Route::get('/admin/index', [AdminController::class, 'index'])->middleware('adminsession');
Route::get('/admin/logout', [AdminController::class, 'logout'])->middleware('adminsession');
Route::any('/admin/amenities', [AdminController::class, 'amenities'])->middleware('adminsession');
Route::any('/admin/new-apartment', [AdminController::class, 'new_apartment'])->middleware('adminsession');
Route::any('/admin/all-apartments', [AdminController::class, 'apartments'])->middleware('adminsession');
Route::any('/admin/room-status/{id}/{status}', [AdminController::class, 'room_status'])->middleware('adminsession');
Route::any('/admin/edit-apartment/{id}', [AdminController::class, 'edit_apartment'])->middleware('adminsession');
Route::any('/admin/deleteimage', [AdminController::class, 'deleteimage'])->middleware('adminsession');
Route::any('/admin/delete-room/{id}', [AdminController::class, 'delete_room'])->middleware('adminsession');
Route::any('/admin/users', [AdminController::class, 'users'])->middleware('adminsession');
Route::any('/admin/user-status/{id}/{status}', [AdminController::class, 'user_status'])->middleware('adminsession');
Route::any('/admin/delete-user/{id}', [AdminController::class, 'delete_user'])->middleware('adminsession');

Route::any('/admin/orders', [AdminController::class, 'orders'])->middleware('adminsession');
Route::any('/admin/order-details/{id}', [AdminController::class, 'order_details'])->middleware('adminsession');
Route::any('/admin/order-status/{id}/{status}', [AdminController::class, 'order_status'])->middleware('adminsession');
Route::any('/admin/delete-order/{id}', [AdminController::class, 'delete_order'])->middleware('adminsession');