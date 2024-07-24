<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\UsersController;

Route::get('/back_about_us', [AboutUsController::class, 'index']);
Route::post('/back_about_us', [AboutUsController::class, 'update']);
// Route::post('/api/acc_check',[UsersController::class, 'checkAccount']);