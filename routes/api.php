<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\PagesController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// index page api
Route::get('/index', [PagesController::class, 'Apiindex']);

//register and login api
Route::controller(RegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::get('verify-mail/{id}/{hash}', 'verify_email');
    Route::post('/login', 'login');
});

//Deshboard controller api
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/deshboard', 'index');
        Route::get('/user-edit-page', 'userSettingEdit');
        Route::post('/user-update', 'userUpdate');
        Route::post('/user-password-update', 'changePassword');
        Route::get('/unpaid/invoice/list', 'unpaid_invoice');
        Route::get('/pertialy/payment/list', 'pertialy_payment');
        Route::get('/over/due/payment/list/', 'over_due_payment');
        Route::get('/all/invoices/send-by-Mail',  'SendByMail');
        Route::get('/create/invoice/view/{id?}', 'user_view_tamplate');
        Route::get('/create/invoice/payment/{id?}', 'user_view_payment');
        Route::post('/create/invoice/payment/save', 'user_payment_save');
        Route::post('/search-result', 'search_result');
    });
    Route::controller(SettingController::class)->group(function () {
        Route::get('/myallinvoice',  'Myallinvoice');
        Route::get('/my-trash-invoice', 'MyTrashinvoice');
    });

    // create invoice page api
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/create-invoice',  'index');
        Route::post('/invoice-store',  'invoiceStore');
        // send invoice mail with PDF
        Route::post('/invoice/send',  'send_invoice');
    });
});
