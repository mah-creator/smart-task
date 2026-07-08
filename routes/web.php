<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('folders', FolderController::class);
    Route::post('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
    Route::post('chat/message', [ChatController::class, 'sendMessage'])->name('chat.message');
});
