<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\FinalReportController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\DeadlineController;

// daftar semua endpoint proposal
Route::get('/proposals', [ProposalController::class, 'index']);     // lihat semua proposal
Route::post('/proposals', [ProposalController::class, 'store']);    // dosen upload proposal
Route::get('/proposals/{proposal}', [ProposalController::class, 'show']); // lihat detail 1 proposal
Route::put('/proposals/{proposal}', [ProposalController::class, 'update']); // update (admin ubah status / edit judul)
Route::delete('/proposals/{proposal}', [ProposalController::class, 'destroy']); // hapus proposal
// Reviews
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);
Route::put('/reviews/{review}', [ReviewController::class, 'update']);
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy']);

// Progress Reports
Route::get('/progress-reports', [ProgressReportController::class, 'index']);
Route::post('/progress-reports', [ProgressReportController::class, 'store']);
Route::get('/progress-reports/{progressReport}', [ProgressReportController::class, 'show']);
Route::put('/progress-reports/{progressReport}', [ProgressReportController::class, 'update']);
Route::delete('/progress-reports/{progressReport}', [ProgressReportController::class, 'destroy']);

// Final Reports
Route::get('/final-reports', [FinalReportController::class, 'index']);
Route::post('/final-reports', [FinalReportController::class, 'store']);
Route::get('/final-reports/{finalReport}', [FinalReportController::class, 'show']);
Route::put('/final-reports/{finalReport}', [FinalReportController::class, 'update']);
Route::delete('/final-reports/{finalReport}', [FinalReportController::class, 'destroy']);

// Outputs
Route::get('/outputs', [OutputController::class, 'index']);
Route::post('/outputs', [OutputController::class, 'store']);
Route::get('/outputs/{output}', [OutputController::class, 'show']);
Route::put('/outputs/{output}', [OutputController::class, 'update']);
Route::delete('/outputs/{output}', [OutputController::class, 'destroy']);

// Deadlines
Route::get('/deadlines', [DeadlineController::class, 'index']);
Route::post('/deadlines', [DeadlineController::class, 'store']);
Route::get('/deadlines/{deadline}', [DeadlineController::class, 'show']);
Route::put('/deadlines/{deadline}', [DeadlineController::class, 'update']);
Route::delete('/deadlines/{deadline}', [DeadlineController::class, 'destroy']);