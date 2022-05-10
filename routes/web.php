<?php

use App\Http\Controllers\JocController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValoracioController;
use \App\Http\Controllers\LogInController;

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

Route::get('/', [LogInController::class, 'welcome']);


//******************************JOC**********************************//
Route::get('list-joc', [JocController::class, 'list']);
Route::get('show-joc/{jocID}', [JocController::class, 'show']);
Route::get('create-joc', [JocController::class, 'create']);
Route::post('save-joc', [JocController::class, 'save']);
Route::get('edit-joc/{jocID}', [JocController::class, 'edit']);
Route::post('update-joc', [JocController::class, 'update']);
Route::get('delete-joc/{jocID}', [JocController::class, 'delete']);

//******************************SALA**********************************//
Route::get('list-sala', [SalaController::class, 'list']);
Route::get('create-sala', [SalaController::class, 'create']);
Route::post('save-sala', [SalaController::class, 'save']);
Route::get('edit-sala/{salaID}', [SalaController::class, 'edit']);
Route::post('update-sala', [SalaController::class, 'update']);
Route::get('delete-sala/{salaID}', [SalaController::class, 'delete']);

//******************************PARTICIPANT**********************************//
Route::get('list-participant', [ParticipantController::class, 'list']);
Route::get('create-participant', [ParticipantController::class, 'create']);
Route::post('save-participant', [ParticipantController::class, 'save']);
Route::get('edit-participant/{participantID}', [ParticipantController::class, 'edit']);
Route::post('update-participant', [ParticipantController::class, 'update']);
Route::get('delete-participant/{participantID}', [ParticipantController::class, 'delete']);

//******************************VOUCHER**********************************//
Route::get('list-voucher', [VoucherController::class, 'list']);
Route::get('create-voucher', [VoucherController::class, 'create']);
Route::post('save-voucher', [VoucherController::class, 'save']);
Route::get('edit-voucher/{voucherID}', [VoucherController::class, 'edit']);
Route::post('update-voucher', [VoucherController::class, 'update']);
Route::get('delete-voucher/{voucherID}', [VoucherController::class, 'delete']);

//******************************USER**********************************//
Route::get('list-user', [UserController::class, 'list']);
Route::get('show-user/{userID}', [UserController::class, 'show']);
Route::post('save-user', [UserController::class, 'save']);
Route::get('edit-user/{userID}', [UserController::class, 'edit']);
Route::post('update-user', [UserController::class, 'update']);
Route::get('delete-user/{userID}', [UserController::class, 'delete']);

//******************************VALORACIO**********************************//
Route::get('list-valoracio', [ValoracioController::class, 'list']);
Route::get('create-valoracio', [ValoracioController::class, 'create']);
Route::post('save-valoracio', [ValoracioController::class, 'save']);
Route::get('edit-valoracio/{valoracioID}', [ValoracioController::class, 'edit']);
Route::post('update-valoracio', [ValoracioController::class, 'update']);
Route::get('delete-valoracio/{valoracioID}', [ValoracioController::class, 'delete']);

//******************************RESERVA**********************************//
Route::get('list-reserva', [ReservaController::class, 'list']);
Route::get('create-reserva', [ReservaController::class, 'create']);
Route::post('save-reserva', [ReservaController::class, 'save']);
Route::get('edit-reserva/{reservaID}', [ReservaController::class, 'edit']);
Route::post('update-reserva', [ReservaController::class, 'update']);
Route::get('delete-reserva/{reservaID}', [ReservaController::class, 'delete']);

//******************************LOGIN/REGISTER*******************************//
Route::get('register', [UserController::class, 'create']);
Route::get('login', [LogInController::class, 'login']);
Route::post('checkLogin', [LogInController::class, 'checkLogin']);
Route::get('logout', [LogInController::class, 'logout']);
