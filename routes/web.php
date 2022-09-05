<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminOffersController;
use App\Http\Controllers\Admin\AdminOrderTypeController;
use App\Http\Controllers\Admin\AdminSparePartController;
use App\Http\Controllers\Admin\AdminColorController;
use App\Http\Controllers\Admin\AdminAccessoryController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminConditionController;
use App\Http\Controllers\Admin\AdminLockerController;
use App\Http\Controllers\Admin\AdminManufactureController;
use App\Http\Controllers\Admin\AdminModalsController;
use App\Http\Controllers\Admin\AdminProblemController;
use App\Http\Controllers\Admin\AdminProblemCategoryController;
use App\Http\Controllers\Admin\AdminStorageController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminCompleteController;
use App\Http\Controllers\Admin\AdminForwardController;
use App\Http\Controllers\Admin\AdminInsuranceController;
use App\Http\Controllers\Admin\AdminInvoiceController;
use App\Http\Controllers\Admin\AdminPaymentTermsController;
use App\Http\Controllers\Admin\AdminProgressController;
use App\Http\Controllers\Admin\AdminReceiveController;
use App\Http\Controllers\Admin\AdminReturnDeviceController;
use App\Http\Controllers\Admin\AdminReturnController;
use App\Http\Controllers\Admin\AdminSupplierController;
use App\Http\Controllers\Admin\AdminWaitingController;
use App\Http\Controllers\Admin\AdminAllController;
use App\Http\Controllers\Shop\ShopAllController;
use App\Http\Controllers\Shop\ShopProfileController;
use App\Http\Controllers\Shop\ShopOffersController;
use App\Http\Controllers\Shop\ShopOrderTypeController;
use App\Http\Controllers\Shop\ShopSparePartController;
use App\Http\Controllers\Shop\ShopColorController;
use App\Http\Controllers\Shop\ShopOrdersController;
use App\Http\Controllers\Shop\ShopAccessoryController;
use App\Http\Controllers\Shop\ShopBrandController;
use App\Http\Controllers\Shop\ShopConditionController;
use App\Http\Controllers\Shop\ShopLockerController;
use App\Http\Controllers\Shop\ShopManufactureController;
use App\Http\Controllers\Shop\ShopModalsController;
use App\Http\Controllers\Shop\ShopProblemController;
use App\Http\Controllers\Shop\ShopProblemCategoryController;
use App\Http\Controllers\Shop\ShopBookingController;
use App\Http\Controllers\Shop\ShopCompleteController;
use App\Http\Controllers\Shop\ShopForwardController;
use App\Http\Controllers\Shop\ShopInsuranceController;
use App\Http\Controllers\Shop\ShopInvoiceController;
use App\Http\Controllers\Shop\ShopPaymentTermsController;
use App\Http\Controllers\Shop\ShopProgressController;
use App\Http\Controllers\Shop\ShopReceiveController;
use App\Http\Controllers\Shop\ShopReturnDeviceController;
use App\Http\Controllers\Shop\ShopReturnController;
use App\Http\Controllers\Shop\ShopSupplierController;
use App\Http\Controllers\Shop\ShopWaitingController;
use App\Http\Controllers\Shop\ShopStorageController;
use App\Http\Controllers\Shop\ShopValueAddTaxController;
use App\Http\Controllers\Shop\ShopPrintSettingInvoiceController;
use App\Http\Controllers\Shop\ShopPrintSettingRepairController;
use App\Http\Controllers\Shop\ShopPrintSettingDeliveryController;
use App\Http\Controllers\Shop\ShopPrintSettingCostController;
use App\Http\Controllers\Shop\ShopPriceManagementListController;
use App\Http\Controllers\User\UserOrderStatusController;

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




Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth','verified','shop.approval'])->name('dashboard');

Route::domain('{username}.' . env('APP_URL'))->group(function () {
    // Route::get('post/{id?}', function ($username, $id) {
    //     return 'User ' . $username . ' is trying to read post ' . $id;
    // });
    Route::get('/',[DashboardController::class,'shopLanding'])->name('shop.landing');
    
    Route::get('place-order', [DashboardController::class,'placeOrderView'])->name('place.order.mobile.repair');
    Route::post('place-order', [DashboardController::class,'placeOrderStore'])->name('order.store');
    Route::get('order-conformed/{statusCode?}', [DashboardController::class,'placeOrderViewComplete'])->name('place.order.mobile.repair.complete');
});

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::name('user.')->prefix("user")->group(function () {
    Route::resource('orderstatus', UserOrderStatusController::class);
});

Route::name('shop.')->prefix("shop")->middleware(['auth','verified','shop.approval','role:Shop'])->group(function () {
    Route::resource('profile', ShopProfileController::class);
    Route::resource('offers', ShopOffersController::class);
    Route::resource('ordertype', ShopOrderTypeController::class);
    Route::resource('sparepart', ShopSparePartController::class);
    Route::resource('color', ShopColorController::class);
    Route::get('/orders/chat/{id?}', [ShopOrdersController::class, 'chat'])->name('orders.chat');
    Route::resource('orders', ShopOrdersController::class);
    Route::resource('accessory', ShopAccessoryController::class);
    Route::resource('brand', ShopBrandController::class);
    Route::resource('condition', ShopConditionController::class);
    Route::resource('locker', ShopLockerController::class);
    Route::resource('manufacture', ShopManufactureController::class);
    Route::resource('modal', ShopModalsController::class);
    Route::resource('problem', ShopProblemController::class);
    Route::resource('problemcategory', ShopProblemCategoryController::class);
    Route::resource('storage', ShopStorageController::class);
    Route::resource('booking', ShopBookingController::class);
    Route::resource('complete', ShopCompleteController::class);
    Route::resource('forward', ShopForwardController::class);
    Route::resource('insurance', ShopInsuranceController::class);
    Route::resource('invoice', ShopInvoiceController::class);
    Route::resource('paymentterms', ShopPaymentTermsController::class);
    Route::resource('progress', ShopProgressController::class);
    Route::resource('receive', ShopReceiveController::class);
    Route::resource('returndevice', ShopReturnDeviceController::class);
    Route::resource('return', ShopReturnController::class);
    Route::resource('supplier', ShopSupplierController::class);
    Route::resource('waiting', ShopWaitingController::class);
    Route::resource('valueaddtax', ShopValueAddTaxController::class);
    Route::resource('printsettinginvoice', ShopPrintSettingInvoiceController::class);
    Route::resource('printsettingcost', ShopPrintSettingCostController::class);
    Route::resource('printsettingdelivery', ShopPrintSettingDeliveryController::class);
    Route::resource('printsettingrepair', ShopPrintSettingRepairController::class);
    Route::resource('pricemanagementlist', ShopPriceManagementListController::class);
    Route::get('/shop-example',[ShopAllController::class,'shopExample'])->name('example');
});

Route::name('admin.')->prefix("admin")->middleware(['auth','role:Admin'])->group(function () {
    Route::resource('users', AdminUserController::class);
    Route::resource('offers', AdminOffersController::class);
    Route::resource('ordertype', AdminOrderTypeController::class);
    Route::resource('sparepart', AdminSparePartController::class);
    Route::resource('color', AdminColorController::class);
    Route::resource('accessory', AdminAccessoryController::class);
    Route::resource('brand', AdminBrandController::class);
    Route::resource('condition', AdminConditionController::class);
    Route::resource('locker', AdminLockerController::class);
    Route::resource('manufacture', AdminManufactureController::class);
    Route::resource('modal', AdminModalsController::class);
    Route::resource('problem', AdminProblemController::class);
    Route::resource('problemcategory', AdminProblemCategoryController::class);
    Route::resource('storage', AdminStorageController::class);
    Route::resource('booking', AdminBookingController::class);
    Route::resource('complete', AdminCompleteController::class);
    Route::resource('forward', AdminForwardController::class);
    Route::resource('insurance', AdminInsuranceController::class);
    Route::resource('invoice', AdminInvoiceController::class);
    Route::resource('paymentterms', AdminPaymentTermsController::class);
    Route::resource('progress', AdminProgressController::class);
    Route::resource('receive', AdminReceiveController::class);
    Route::resource('returndevice', AdminReturnDeviceController::class);
    Route::resource('return', AdminReturnController::class);
    Route::resource('supplier', AdminSupplierController::class);
    Route::resource('waiting', AdminWaitingController::class);
});


   























    // Route::domain(env('SESSION_DOMAIN'))->group(function () {
    //     Route::get('/', function () {
    //         return view('welcome');
    //     })->name('home');
    // });
    
    // Route::domain('{username?}'.'.'.env('SESSION_DOMAIN'))->group(function () {
    //     // Routes for sub-domains
    //      Route::middleware('auth')->group(function () {


    //         Route::get('/dashboard', [CheckController::class,'dashboard'])->name('dashboard');


    //             });
    // });
       




require __DIR__.'/auth.php';
