<?php

use App\Http\Controllers\doaController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\quoteController;
use App\Http\Controllers\quranController;
use Illuminate\Support\Facades\Route;

Route::resource('/', quoteController::class);

Route::get('/produk/1', function () {
    return response()->json([
            [
                'id' => 1,
                'nama' => 'buku lima sekawan',
                'harga' => 10000,
                'stok' => 'terseduia'
            ],
    ]);
});
Route::get('/produk/2', function () {
    return response()->json([
            [
                'id' => 2,
                'nama' => 'buku pelajaran',
                'harga' => 10000,
                'stok' => 'tersedia'
            ],
    ]);
});
Route::get('/produk/3', function () {
    return response()->json([
            [
                'id' => 3,
                'nama' => 'buku cerita fabel',
                'harga' => 10000,
                'stok' => 'tersedia'
            ],
    ]);
});
Route::get('/produk/4', function () {
    return response()->json([
            [
                'id' => 4,
                'nama' => 'buku madilog',
                'harga' => 10000,
                'stok' => 'tidak tersedia'
            ],
    ]);
});
Route::get('/produk/5', function () {
    return response()->json([
            [
                'id' => 5,
                'nama' => 'buku hamlett',
                'harga' => 10000,
                'stok' => 'tersedia'
            ],
    ]);
});
Route::get('/produk/6', function () {
    return response()->json([
            [
                'id' => 6,
                'nama' => 'buku resep',
                'harga' => 10000,
                'stok' => 'tersedia'
            ],
    ]);
});
Route::get('/produk', function(){
    return response()->json([
        [
            'id' => 1,
            'nama' => 'buku lima sekawan',
            'harga' => 10000,
            'stok' => 'tersedia'
        ],
        [
            'id' => 2,
            'nama' => 'buku pelajaran',
            'harga' => 10000,
            'stok' => 'tersedia'
        ],
        [
            'id' => 3,
            'nama' => 'buku cerita fabel',
            'harga' => 10000,
            'stok' => 'tersedia'
        ],
        [
            'id' => 4,
            'nama' => 'buku madilog',
            'harga' => 10000,
            'stok' => 'tidak tersedia'
        ],
        [
            'id' => 5,
            'nama' => 'buku hamlett',
            'harga' => 10000,
            'stok' => 'tersedia'
        ],
        [
            'id' => 6,
            'nama' => 'buku resep',
            'harga' => 10000,
            'stok' => 'tersedia'
        ]
    ]);
});

Route::get('/quotes', [App\Http\Controllers\quoteController::class, 'index']);

Route::resource('quran', quranController::class);

Route::resource('doa', doaController::class);

Route::get('/jadwal', [jadwalController::class, 'index'])->name('jadwal.index');