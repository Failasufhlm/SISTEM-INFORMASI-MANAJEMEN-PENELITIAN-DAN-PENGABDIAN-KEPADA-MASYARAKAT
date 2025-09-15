<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalPageController;
use App\Http\Controllers\HomePageController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/proposals', [ProposalPageController::class, 'index']);
