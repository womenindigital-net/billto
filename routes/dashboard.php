<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\SettignsController;
use Illuminate\Support\Facades\Route;


// user desh board all route 
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/all/invoices', [DashboardController::class, 'allInvoice'])->name('all.invoice');
    Route::delete('/delete/invoices/{id}', [DashboardController::class, 'destroy'])->name('delete.invoice');
    Route::GET('/edit/invoices/{id}', [DashboardController::class, 'edit'])->name('edit.invoice');
    Route::GET('/settigns', [SettignsController::class, 'Settign'])->name('settigns');
    Route::GET('/default-setting', [SettignsController::class, 'DefaultSetting'])->name('default.setting');
    Route::GET('/my-all-invoice', [SettignsController::class, 'Myallinvoice']);
    Route::GET('/my-trash-invoice', [SettignsController::class, 'MyTrashinvoice']);
    //dashboard user setting start
    Route::get('/all/invoices/user-setting', [DashboardController::class, 'userSettingEdit']);
    Route::put('/all/invoices/user-setting{id}', [DashboardController::class, 'userUpdate']);
    Route::post('/all/invoices/change-password', [DashboardController::class, 'changePassword']);
    Route::get('/unpaid/invoice/list', [DashboardController::class, 'unpaid_invoice']);
    Route::get('pertialy/payment/list', [DashboardController::class, 'pertialy_payment']);
    Route::get('/over/due/payment/list/', [DashboardController::class, 'over_due_payment']);
    //dashboard user setting start
    Route::get('/all/invoices/send-by-Mail', [DashboardController::class, 'SendByMail']);
    Route::get('/create/invoice/view/{id}', [DashboardController::class, 'user_view_tamplate']);
    //payment due
    Route::get('/create/invoice/payment/{id}', [DashboardController::class, 'user_view_payment']);
    Route::post('/create/invoice/payment/save', [DashboardController::class, 'user_payment_save'])->name('payment.save');
    // search result dasboard
    Route::post('/search-result', [DashboardController::class, 'search_result'])->name('search.result');

});
