<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ChartOfAccountController;

Route::get('/', function () {
    return view('welcome');
});

// ROUTE CUSTOMERS
Route::resource('customers', CustomerController::class);

// ROUTE CHART OF ACCOUNT
Route::get('/chart-of-accounts', [ChartOfAccountController::class, 'index'])
    ->name('chart-of-accounts.index');

Route::get('/chart-of-accounts/create', [ChartOfAccountController::class, 'create'])
    ->name('chart-of-accounts.create');

Route::post('/chart-of-accounts', [ChartOfAccountController::class, 'store'])
    ->name('chart-of-accounts.store');

Route::get('/chart-of-accounts/{chartOfAccount}', [ChartOfAccountController::class, 'show'])
    ->name('chart-of-accounts.show');

Route::get('/chart-of-accounts/{chartOfAccount}/edit', [ChartOfAccountController::class, 'edit'])
    ->name('chart-of-accounts.edit');

Route::put('/chart-of-accounts/{chartOfAccount}', [ChartOfAccountController::class, 'update'])
    ->name('chart-of-accounts.update');

Route::delete('/chart-of-accounts/{chartOfAccount}', [ChartOfAccountController::class, 'destroy'])
    ->name('chart-of-accounts.destroy');
