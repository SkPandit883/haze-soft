<?php

use App\Library\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/departments/{company_id}', [ApiController::class, 'departments']);
    Route::get('/department/employees/{department_id}', [ApiController::class, 'departmentEmployees']);
    Route::get('/employee/show/{employee_id}', [ApiController::class, 'employee']);
});
Route::get('/companies', [ApiController::class, 'companies']);
Route::get('/company/employees/{company_id}', [ApiController::class, 'companyEmployees']);
Route::fallback(function () {
    return Message::notFound();
});
