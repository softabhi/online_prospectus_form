<?php

use App\Http\Controllers\AdmissionEnquiry;
use App\Http\Controllers\EasebuzzController;
use App\Http\Controllers\EmailSendController;
use App\Http\Controllers\ProspectusController;
use Illuminate\Support\Facades\Route;

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


// for prospectus 
Route::get('/', [ProspectusController::class, 'index'])->name('prospectus');
Route::post('/store', [ProspectusController::class, 'store'])->name('prospectus');
Route::get('/otp/{mobile_number}/{email}', [ProspectusController::class, 'send_otp'])->name('prospectus.otp');
Route::get('/confirmation', [ProspectusController::class, 'confirmation'])->name('prospectus.confirmation');
Route::get('/course/{id}', [ProspectusController::class, 'course'])->name('prospectus.course');
Route::get('/already', [ProspectusController::class, 'already'])->name('prospectus.already');

// for payment
Route::post('prospectus/payment', [EasebuzzController::class, 'store'])->name('easebuzz');
Route::post('response', [EasebuzzController::class, 'response2'])->name('response');
Route::get('print', [EasebuzzController::class, 'print_form'])->name('print');



// for admission 
Route::post('admission/otp/verification', [AdmissionEnquiry::class, 'otp_generating'])->name('admission.otp_generating');
Route::post('admission/otp/verify/', [AdmissionEnquiry::class, 'otp_verify'])->name('admission.otp_verify');
Route::post('admission/admission/form', [AdmissionEnquiry::class, 'admission_form'])->name('admission.admission_form');
Route::post('admission/admission_document/form', [AdmissionEnquiry::class, 'admission_document'])->name('admission.admission_document');
Route::get('admission/session/{course_id}', [AdmissionEnquiry::class, 'session_get'])->name('admission.session');
Route::get('admission/thankyou', [AdmissionEnquiry::class, 'thankyou'])->name('admission.thankyou');

// for email send testing



