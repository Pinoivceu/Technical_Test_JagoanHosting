<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\WargaController;
use App\Http\Controllers\api\RumahController;
use App\Http\Controllers\api\RiwayatPenghuniController;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\api\RumahPenghuniController;


Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/warga', WargaController::class);
Route::resource('/rumah', RumahController::class);

Route::middleware('auth:sanctum')->group(function () {


});

Route::get('/foto_ktp/{filename}', function ($filename) {
    $path = storage_path('app/private/foto_ktp/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path);
});

Route::put('/warga/{id}/nonaktif', [WargaController::class, 'nonaktifkan']);


Route::apiResource('riwayat-penghuni', RiwayatPenghuniController::class);

  Route::get('/rumah-penghuni', [RumahPenghuniController::class, 'index']);