<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\ParametersController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\BillingController;

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

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    /* Main Page Route */
    Route::get('/{company?}', [DashboardController::class, 'index'])->name('dashboard');
    /* Main Page Route */

    /* Route Apps */
    Route::group(['prefix' => 'app'], function () {
        Route::get('todo', [AppsController::class, 'todoApp'])->name('app.todo');

        Route::get('calendar', [AppsController::class, 'calendarApp'])->name('app.calendar');

        Route::get('invoice/list', [AppsController::class, 'invoice_list'])->name('app.invoice-list');
        Route::get('invoice/preview', [AppsController::class, 'invoice_preview'])->name('app.invoice-preview');
        Route::get('invoice/edit', [AppsController::class, 'invoice_edit'])->name('app.invoice-edit');
        Route::get('invoice/add', [AppsController::class, 'invoice_add'])->name('app.invoice-add');
        Route::get('invoice/print', [AppsController::class, 'invoice_print'])->name('app.invoice-print');

        Route::get('file-manager', [AppsController::class, 'file_manager'])->name('app.file-manager');

        Route::get('user/list', [AppsController::class, 'user_list'])->name('app.user-list');
        Route::get('user/view/account', [AppsController::class, 'user_view_account'])->name('app.user-view-account');
        Route::get('user/view/security', [AppsController::class, 'user_view_security'])->name('app.user-view-security');
        Route::get('user/view/billing', [AppsController::class, 'user_view_billing'])->name('app.user-view-billing');
        Route::get('user/view/notifications', [AppsController::class, 'user_view_notifications'])->name('app.user-view-notifications');
        Route::get('user/view/connections', [AppsController::class, 'user_view_connections'])->name('app.user-view-connections');
    });
    /* Route Apps */

    /* Route Operation */
    Route::group(['prefix' => 'operation'], function () {

        //Route::post('plants/{company}', [PlantController::class, 'index'])->name('index');
        Route::resource('plants', PlantController::class)->parameters(['plants' => 'company']);

        Route::get('plants/{company}', [PlantController::class, 'index'])->name('plants.index');
        Route::resource('plants', PlantController::class)->except('index');


        Route::get('parameters/{id}/create', [ParametersController::class, 'create'])->name('parameters.create');
        Route::get('parameters/exportPDF/{id}/{date_range?}', [ParametersController::class, 'exportPDF'])->name('parameters.pdf');
        Route::resource('parameters', ParametersController::class)->except('index', 'create')->parameters(['parameters' => 'company']);
    });
    /* Route Operation */

    /* Route Administration */
    Route::group(['prefix' => 'administration'], function () {
        //Route::get('plants/', [PlantController::class, 'index'])->name('plants.index');
        Route::get('billing/{id}', [BillingController::class, 'index'])->name('billing.index');
        Route::resource('billing', BillingController::class)->except('index');
    });
    /* Route Administration */

    // locale Route
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);
});