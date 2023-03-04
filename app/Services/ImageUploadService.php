<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function uploadImage($image, $folder = 'images')
    {
        $imageName = time().'.'.$image->extension();  
        
        $path = Storage::disk('s3')->put($folder . '/' . $imageName, file_get_contents($image));
        $path = Storage::disk('s3')->url($path);
        
        if ($path) {
            return $imageName;
        } else {
            return null; 
        }
    }
}
