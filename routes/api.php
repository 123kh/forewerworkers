<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\AssignjobController;
use App\Http\Controllers\Master\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Master\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\LocationController;
use App\Http\Controllers\Master\PayoutpayrunController;
use App\Http\Controllers\Tax_Master\FedralSlabController;
use App\Http\Controllers\Tax_Master\FedraltaxrebateController;
use App\Http\Controllers\Tax_Master\OtherTaxController;
use App\Http\Controllers\Tax_Master\ProvitialtaxSlabController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\PayrollController;
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

Route::post('login',[ApiController::class,'login']);
Route::post('get_user_details',[ApiController::class,'get_user_details']);
Route::post('get_user_jobs',[ApiController::class,'get_user_jobs']);
Route::post('get_job_by_date',[ApiController::class,'get_job_by_date']);
Route::post('check_in_job',[ApiController::class,'check_in_job']);
Route::post('check_out_job',[ApiController::class,'check_out_job']);
Route::get('accept_reject_job',[ApiController::class,'accept_reject_job']);
Route::post('upload_timesheet',[ApiController::class,'upload_timesheet']);
Route::post('forgot_password_otp',[ApiController::class,'forgot_password_otp']);
Route::post('update_password',[ApiController::class,'update_password']);
Route::post('update_password_by_id',[ApiController::class,'update_password_by_id']);
Route::post('get_payroll',[ApiController::class,'get_payroll']);
Route::post('get_company_list',[ApiController::class,'get_company_list']);
Route::post('get_company_wise_data',[ApiController::class,'get_company_wise_data']);
