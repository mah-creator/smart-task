<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
});
