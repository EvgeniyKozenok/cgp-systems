<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PassportAuthController;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::namespace('Api')->middleware(['auth:api'])->group(function () {
    Route::get('/companies', [CompanyController::class, 'index']);

    Route::get('/clients/{companyId}', [ClientController::class, 'companyClientList']);
    Route::get('/clients/{clientId}/companies', [ClientController::class, 'clientCompanyList']);
});
