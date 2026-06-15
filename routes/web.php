<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobsListController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);

Route::resource('jobs', JobsListController::class)->only(['index', 'show']);

