<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/foto_ktp/{filename}', function ($filename) {
    $path = storage_path('app/private/foto_ktp/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path);
});