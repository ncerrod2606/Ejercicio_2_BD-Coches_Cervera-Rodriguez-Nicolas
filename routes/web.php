<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;

Route::get('/', [CocheController::class, 'index'])->name('index');