<?php

namespace App\Services;

use Image;
use Illuminate\Http\Request;

class UploadImageService{

    public function uploadThumbnail(Request $request, $author, $slug){

        $image = $request->file('thumbnail');
        $input['thumbnail'] = 'thumbnail-'. $slug.'-'. $this->createFileName() . '.' . $image->getClientOriginalExtension();

        $imgFile = Image::make($image->getRealPath());

        if (!file_exists(storage_path('app/public/thumbnails'))) mkdir(storage_path('app/public/thumbnails'), 0777, true);

        $destinationPath = storage_path('app/public/thumbnails');
        $imageName = $imgFile->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['thumbnail'], 100);
        $newImageName = $imageName->basename;

        return $newImageName;
    }

    private function createFileName(){
        return md5(uniqid(rand(), true));
    }
}
