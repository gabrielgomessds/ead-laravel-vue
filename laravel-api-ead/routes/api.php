<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController,
    LessonController,
    SupportController,
    ReplySupportController
};

use App\Http\Controllers\Api\Auth\{
    AuthController,
    ResetPasswordController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);


Route::post('/forget-password', [ResetPasswordController::class,'sendResetLink'])->middleware(['guest']);
Route::post('/reset-password', [ResetPasswordController::class,'resetPassword'])->middleware(['guest']);

Route::middleware(['auth:sanctum'])->group(function () {

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
Route::get('/lessons/{id}', [LessonController::class, 'show']);

Route::get('/supports', [SupportController::class, 'index']);

Route::get('/lessons', [LessonController::class, 'viewd']);

Route::get('/my-supports', [SupportController::class, 'mySupports']);
Route::post('/supports', [SupportController::class, 'store']);

Route::post('/replies', [ReplySupportController::class, 'createReply']);

});

Route::get('/', function() {
    return response()->json([
        'success' => true
    ]);
});
