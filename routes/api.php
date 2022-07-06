<?php

use App\Library\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/companies', [ApiController::class, 'companyStore']);
Route::get('/departments', [ApiController::class, 'departments']);
Route::get('/departments', [ApiController::class, 'departments']);
Route::get('/employee/show/{employee_id}',[ApiController::class, 'employee']);
Route::fallback(function () {
    return Message::notFound();
});
