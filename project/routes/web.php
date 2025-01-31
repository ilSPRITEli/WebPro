<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitchenOrderController;
use App\Http\Controllers\MenuManagementController;


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



Route::get('/queue', function () {
    return view('queue');
});

Route::get('/kitchenorder', [KitchenOrderController::class, 'index']);

Route::match(['get', 'post'], 'kitchenorder/updateOrderStage/{orderId}/{menuId}', [KitchenOrderController::class, 'updateOrderStage'])->name('updateOrderStage');
Route::match(['get', 'post'], 'kitchenorder/completeOrderStage/{orderId}/{menuId}', [KitchenOrderController::class, 'completeOrderStage'])->name('completeOrderStage');

Route::get('kitchenorder/updateOrderStatus/{orderId}', [KitchenOrderController::class, 'updateOrderStatus'])->name('updateOrderStatus');
Route::get('kitchenorder/completeOrderStatus/{orderId}', [KitchenOrderController::class, 'completeOrderStatus'])->name('completeOrderStatus');





Route::get('/menumanagement', function () {
    return view('menumanagement');
});
Route::get('/menumanagement', [MenuManagementController::class, 'index']);
Route::post('/menumanagement/update/{menuId}', [MenuManagementController::class, 'update'])->name('menu.update');
Route::post('/menumanagement/add', [MenuManagementController::class, 'add'])->name('menu.add');




