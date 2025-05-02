<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

// GET: Menampilkan semua pesanan
Route::get('/orders', [OrderController::class, 'index']);

// GET: Menampilkan pesanan berdasarkan ID
Route::get('/orders/{id}', [OrderController::class, 'show']);

// POST: Membuat pesanan baru
Route::post('/orders', [OrderController::class, 'store']);

// PUT: Memperbarui pesanan berdasarkan ID
Route::put('/orders/{id}', [OrderController::class, 'update']);

// DELETE: Menghapus pesanan berdasarkan ID
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
