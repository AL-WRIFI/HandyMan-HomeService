<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HandymanController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Order;
use App\Http\livewire\ShowService;
use App\Http\Livewire\UserOrder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categories', CategoryController::class);
Route::resource('services', ServiceController::class);
Route::get('/handymans', [HandymanController::class,'index'])->name('handymans.index');
Route::get('/handymans/create', [HandymanController::class,'create'])->name('handymans.create');
Route::post('/handymans/store', [HandymanController::class,'store'])->name('handymans.store');
Route::get('/handymans/{handyman}/edit', [HandymanController::class,'edit'])->name('handymans.edit');
Route::post('/handymans/{id}/update', [HandymanController::class,'update'])->name('handymans.update');
Route::delete('/handymen/{handyman}', [HandymanController::class,'destroy'])->name('handymans.destroy');
Route::resource('orders', OrderController::class);
Route::any('status_update/{id}', [HandymanController::class,'status_update'])->name('status_update');
Route::get('Orderlist/{status}', [OrderController::class,'index'])->name('order.list');
Route::get('OrderDetails/{order}', [OrderController::class,'details'])->name('order.details');
//Route::get('categories/list', [CategoryController::class, 'index']);
//Route::get('categories/create', [CategoryController::class, 'create']);

// Route::get('/var', function () {
//     return view('index');
// });

//Route::get('/services/{category_id}/edit', ShowService::class)->name('services');
//Route::get('/cvar/{id}', ShowService::class);
//Route::get('/services/{id}', App\Http\Livewire\ShowService::class);
//Route::get('/home', Home::class);


Route::get('/home', Home::class)->name('user-home');
Route::get('/UserOrder', UserOrder::class)->name('user-order');
Route::get('/handymanhome', App\Http\Livewire\Handyman\Index::class)->name('handymanHome');
Route::get('/handymanProfile', App\Http\Livewire\Handyman\HandymanProfile::class)->name('handymanProfile');
Route::get('/CompletedOrder', App\Http\Livewire\User\CompletedOrder::class)->name('completed-order');
Route::get('/category/{category_id}/show_services', App\Http\Livewire\Order::class)->name('show_services');
Route::get('/order', UserOrder::class)->name('UserOrder');
Route::get('/UserProfile', App\Http\Livewire\User\UserProfile::class)->name('user-profile');
Route::get('/showProfile{handyman_id}', App\Http\Livewire\ProviderProfile::class)->name('handyman-show-profile');


Route::get('/category/{category_id}/Services', App\Http\Livewire\Checkout::class)->name('select_services');


//Route::get('/category/{category_id}/show_services', App\Http\Livewire\UserWizard::class)->name('select_services');



//----------Provider-Auth-Route-------------//
// Route::get('/providerlogin', [ProviderAuthController::class, 'login'])->name('provider.login-page');
// Route::post('/providerLogin', [ProviderAuthController::class, 'ProviderLogin'])->name('provider.login');
// Route::middleware('auth:provider')->group(function () {
//     Route::get('/dashboard', [ProviderAuthController::class, 'dashboard'])->name('provider.dashboard');
   
    
//     Route::get('/providerRegister', [ProviderAuthController::class, 'ProviderRegister'])->name('provider.register');
//     Route::post('/providerCreate', [ProviderAuthController::class, 'ProviderCreate'])->name('provider.create');
//     Route::get('/providerLogout', [ProviderAuthController::class, 'ProviderLogout'])->name('provider.logout');
// });

//Route::get('/ProviderRegister',[ ProviderAuthController::class ,'create'])->name('ProviderRegister');


require __DIR__.'/auth.php';
require __DIR__.'/handyman.php';
