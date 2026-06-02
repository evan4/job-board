<?php

use App\Http\Controllers\JobsListController;
use Illuminate\Support\Facades\Route;

Route::resource('jobs', JobsListController::class)->only(['index']);
