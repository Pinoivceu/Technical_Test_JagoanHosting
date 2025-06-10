<?php

use App\Http\Controllers\api\HistoryPembayaranController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\WargaController;
use App\Http\Controllers\api\RumahController;
use App\Http\Controllers\api\RiwayatPenghuniController;
use App\Http\Controllers\api\penghuniController;
use App\Http\Controllers\api\PembayaranController;
use App\Models\Rumah;
use App\Http\Controllers\api\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\api\RumahPenghuniController;


Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {

    Route::resource('/riwayat-penghuni', RiwayatPenghuniController::class);
    Route::put('/warga/{id}/nonaktif', [WargaController::class, 'nonaktifkan']);
    Route::resource('/rumah-penghuni', RumahPenghuniController::class);
    Route::resource('/warga', WargaController::class);
    Route::resource('/rumah', RumahController::class);
    Route::resource('/pembayaran', PembayaranController::class);
    Route::get('/report-summary', [ReportController::class, 'summary']);
    Route::get('/report-detail', [ReportController::class, 'detail']);
    Route::get('/pembayaran-history', [HistoryPembayaranController::class, 'historyPembayaran']);
});

Route::get('/foto_ktp/{filename}', function ($filename) {
    $path = storage_path('app/private/foto_ktp/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path);
});
