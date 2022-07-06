<?php

use App\Library\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});
// ['auth.admin']
Route::prefix('dashboard')->middleware([])->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/companies', [DashboardController::class, 'companies'])->name('companies');
    Route::get('/departments', [DashboardController::class, 'departments'])->name('departments');
    Route::get('/employees', [DashboardController::class, 'employees'])->name('employees');
});

require __DIR__ . '/auth.php';

