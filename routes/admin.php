<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\InvoiceTemplateController;
use App\Http\Controllers\OrganizationPackageController;
use App\Http\Controllers\SubscriptionPackageController;
use App\Models\OrganizationPackage;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([  'prefix' => 'admin',
                'middleware' => ['admin','auth'],
                'as' => 'admin.',
                'namespace' => 'Admin'
            ], function () {
                Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');
                // subscription Package Route
                Route::get('/package/page', [SubscriptionPackageController::class, 'create']);
                Route::post('/package/store', [SubscriptionPackageController::class, 'store']);
                Route::get('/package/{id}/edit', [SubscriptionPackageController::class, 'edit']);
                Route::put('/package/{id}', [SubscriptionPackageController::class, 'update']);
                Route::get('/package/{id}/delete', [SubscriptionPackageController::class, 'destroy']);
                Route::get('/package/list', [SubscriptionPackageController::class, 'index']);
                Route::post('/package/updates', [SubscriptionPackageController::class, 'packageUpdate']);
                Route::get('/package/{id}/addRow', [SubscriptionPackageController::class, 'addRow']);
                Route::post('/package/addRow', [SubscriptionPackageController::class, 'addRowStore']);
                //organization package route
                Route::get('/organization/package/page', [OrganizationPackageController::class, 'create']);
                Route::post('/organization/package/store', [OrganizationPackageController::class, 'store']);
                Route::get('/organization/package/{id}/edit', [OrganizationPackageController::class, 'edit']);
                Route::put('/organization/package/{id}', [OrganizationPackageController::class, 'update']);
                Route::get('organization/package/{id}/delete', [OrganizationPackageController::class, 'destroy']);
                Route::get('/organization/package/list', [OrganizationPackageController::class, 'index']);
                //manage template
                Route::get('/manage/template/page', [InvoiceTemplateController::class, 'create']);
                Route::post('/manage/template/store', [InvoiceTemplateController::class, 'store']);
                Route::get('/manage/template/{id}/edit', [InvoiceTemplateController::class, 'edit']);
                Route::put('/manage/template/{id}', [InvoiceTemplateController::class, 'update']);
                Route::get('/manage/template/{id}/delete', [InvoiceTemplateController::class, 'destroy']);

            });
