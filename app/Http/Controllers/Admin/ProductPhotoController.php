<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller {

    public function removePhoto($photoName) {

        $photoName = 'products/'.$photoName;
        if(Storage::disk('public')->exists($photoName)) {

            Storage::disk('public')->delete($photoName);
        }

        $selectedPhoto = ProductPhoto::where('image', $photoName);
        $selectedPhoto->delete();

        flash('Imagem removida com sucesso!')->success();
        return redirect()->back();
    }
}
