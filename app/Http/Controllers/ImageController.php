<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;

use Laracom\Http\Requests;

use Storage;

class ImageController extends Controller
{
    public function getImageFile($nome) {
        
        $imagem = Storage::disk('local')->get($nome);
        return response($imagem,200)->header('Content-Type', 'image/jpeg');
    }
}
