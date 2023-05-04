<?php

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
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboards');
});


Route::get('login',function () {
    return 'login';
})->name('login');
Route::get('test-mail',[MailController::class,'index']);
Route::get('dashboards',[DashboardController::class,'index'])->name('dashboards');

//Assign Job
Route::get('assignjob',[AssignjobController::class,'index'])->name('assignjob');
Route::get('edit-assignjob/{id}',[AssignjobController::class,'edit_assignjob'])->name('edit-assignjob');
Route::post('insert_assign_job',[AssignjobController::class,'insert_assign_job'])->name('insert_assign_job');
Route::post('update_assign_job',[AssignjobController::class,'update_assign_job'])->name('update_assign_job');
Route::get('delete-assignjob/{id}',[AssignjobController::class,'delete_assignjob'])->name('delete-assignjob');

Route::post('reassign_job',[AssignjobController::class,'reassign_job'])->name('reassign_job');


                        //...............Master...............//
//Location
Route::get('master/locations',[LocationController::class,'index'])->name('Master.location');
Route::post('master/create_location',[LocationController::class,'create'])->name('master.create_location');
Route::get('master/edit_location/{id}',[LocationController::class,'edit_location'])->name('master.edit_location');
Route::post('master/update_location',[LocationController::class,'update_location'])->name('master.update_location');
Route::get('master/destroy_location/{id}',[LocationController::class,'destroy_location'])->name('master.destroy_location');

//Category
Route::post('master/create_ctegory',[LocationController::class,'createcategory'])->name('master.create_ctegory');
Route::get('master/edit_category/{id}',[LocationController::class,'edit_category'])->name('master.edit_category');
Route::post('master/update_category',[LocationController::class,'update_category'])->name('master.update_category');
Route::get('master/destroycat/{id}',[LocationController::class,'destroycategory'])->name('destroycat');

//Company
Route::get('master/companys',[CompanyController::class,'index'])->name('master.company');
Route::post('master/create_company',[CompanyController::class,'create_company'])->name('master.create_company');

//Employee
Route::get('master/employee',[EmployeeController::class,'index'])->name('master.employee');
Route::post('master/create_employee',[EmployeeController::class,'create_employee'])->name('master.create_employee');

//Payrun 
Route::get('master/payoutpayrun',[PayoutpayrunController::class,'index'])->name('master.payoutpayrun');
Route::post('master/create_payrun',[PayoutpayrunController::class,'create_payrun'])->name('master.create_payrun');
Route::get('master/edit_payrun/{id}',[PayoutpayrunController::class,'edit_payrun'])->name('master.edit_payrun');
Route::post('master/update_payrun',[PayoutpayrunController::class,'update_payrun'])->name('master.update_payrun');
Route::get('master/destroy_payrun/{id}',[PayoutpayrunController::class,'destroy_payrun'])->name('master.destroy_payrun');

//Payout
Route::post('master/create_payout',[PayoutpayrunController::class,'create_payout'])->name('master.create_payout');
Route::get('master/edit_payout/{id}',[PayoutpayrunController::class,'edit_payout'])->name('master.edit_payout');
Route::post('master/update_payout',[PayoutpayrunController::class,'update_payout'])->name('master.update_payout');
Route::get('master/destroy_payout/{id}',[PayoutpayrunController::class,'destroy_payout'])->name('destroy_payout');

                     //.............Tax Master................//                      
//taxfedralslab
Route::get('tax_master/fedralslab',[FedralSlabController::class,'index'])->name('taxmaster.fedralslab');
Route::post('master/create_fedralslab',[FedralSlabController::class,'create_fedralslab'])->name('master.create_fedralslab');
Route::get('master/edit_fedralslab/{id}',[FedralSlabController::class,'edit_fedralslab'])->name('master.edit_fedralslab');
Route::post('master/update_fedralslab',[FedralSlabController::class,'update_fedralslab'])->name('master.update_fedralslab');
Route::get('master/destroy_fedralslab/{id}',[FedralSlabController::class,'destroy_fedralslab'])->name('master.destroy_fedralslab');

//provintialtaxslab
Route::get('tax_master/provitialslab',[ProvitialtaxSlabController::class,'index'])->name('taxmaster.provitialslab');
Route::post('master/create_provitialslab',[ProvitialtaxSlabController::class,'create_provitialslab'])->name('master.create_provitialslab');
Route::get('master/edit_provitialslab/{id}',[ProvitialtaxSlabController::class,'edit_provitialslab'])->name('master.edit_provitialslab');
Route::post('master/update_provitialslab',[ProvitialtaxSlabController::class,'update_provitialslab'])->name('master.update_provitialslab');
Route::get('master/destroy_provitialslab/{id}',[ProvitialtaxSlabController::class,'destroy_provitialslab'])->name('master.destroy_provitialslab');

//fedrebart
Route::get('taxmaster/fedraltaxrebate',[FedraltaxrebateController::class,'index'])->name('taxmaster.fedralrebate');
Route::post('master/create_fedraltaxrebate',[FedraltaxrebateController::class,'create_fedraltaxrebate'])->name('master.create_fedraltaxrebate');

//othertax
Route::get('taxmaster/othertax',[OtherTaxController::class,'index'])->name('taxmaster.othertax');
Route::post('master/update_othertax',[OtherTaxController::class,'update_othertax'])->name('master.update_othertax');


//Time Sheet
Route::get('timesheet',[TimesheetController::class,'index'])->name('timesheet');

//PayRoll
Route::get('payroll',[PayrollController::class,'index'])->name('payroll');
Route::get('generate-payroll/{id}',[PayrollController::class,'generate_payroll'])->name('generate-payroll');
