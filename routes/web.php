<?php

use App\Http\Controllers\JobsListController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));
Route::resource('jobs', JobsListController::class)->only(['index']);
