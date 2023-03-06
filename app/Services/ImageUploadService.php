<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Image;

class ImageUploadService
{
    public function uploadImage($image, $folder = 'images')
    {
        $imageName = date('Y') . date('m') . date('d') . md5(time()) . '.' . $image->extension();  
        $imageResize = Image::make($image)->resize(160, 160)->encode($image->extension());
        
        $fullFath = $folder . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . $imageName;
        $path = Storage::disk('s3')->put($fullFath, (string)$imageResize);
        $path = Storage::disk('s3')->url($path);
        
        if ($path) {
            return $imageName;
        } else {
            return null; 
        }
    }
}
