<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

// daftar semua endpoint proposal
Route::get('/proposals', [ProposalController::class, 'index']);     // lihat semua proposal
Route::post('/proposals', [ProposalController::class, 'store']);    // dosen upload proposal
Route::get('/proposals/{proposal}', [ProposalController::class, 'show']); // lihat detail 1 proposal
Route::put('/proposals/{proposal}', [ProposalController::class, 'update']); // update (admin ubah status / edit judul)
Route::delete('/proposals/{proposal}', [ProposalController::class, 'destroy']); // hapus proposal
// tambahkan endpoint lain sesuai kebutuhan (misal untuk review, user management, dll)