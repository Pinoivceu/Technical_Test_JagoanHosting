<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoKtpController extends Controller
{
    public function getFotoKTP($filename)
{
    $path = 'foto_ktp/' . $filename;

    if (!Storage::disk('local')->exists($path)) {
        return response()->json(['message' => 'File not found'], 404);
    }

    $file = Storage::disk('local')->get($path);
    $mime = Storage::disk('local')->mimeType($path);

    return response($file, 200)->header('Content-Type', $mime);
}
}
