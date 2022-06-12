<?php

namespace App\Services;

use Image;
use Illuminate\Http\Request;

class UploadImageService{

    public function uploadThumbnail(Request $request, $slug,$author=null){

        if($author != null){
            $image = $request->file('thumbnail');
            $input['thumbnail'] = 'thumbnail-'. $slug.'-'.$author->id.'-'. $this->createFileName() . '.' . $image->getClientOriginalExtension();
        }else{
            $image = $request->file('image');
            $input['thumbnail'] = 'thumbnail-'. $slug.'-'. $this->createFileName() . '.' . $image->getClientOriginalExtension();
        }


        $imgFile = Image::make($image->getRealPath());

        if (!file_exists(storage_path('app/public/thumbnails'))) mkdir(storage_path('app/public/thumbnails'), 0777, true);

        $destinationPath = storage_path('app/public/thumbnails');
        $imageName = $imgFile->resize(2560, 1440, function ($constraint) {
            $constraint->aspectRatio();
        });
        if($author == null){
            $imageName->crop(400,400);
        }else{
            $imageName->crop(1920,1080);
        }
        $imageName->save($destinationPath . '/' . $input['thumbnail'], 100);
        return $imageName->basename;
    }

    public function uploadAvatar(Request $request,$author){

        $image = $request->file('avatar');
        $input['avatar'] = 'avatar-'. $author->id.'-'. $this->createFileName() . '.' . $image->getClientOriginalExtension();

        $imgFile = Image::make($image->getRealPath());

        if (!file_exists(storage_path('app/public/avatars'))) mkdir(storage_path('app/public/avatars'), 0777, true);

        $destinationPath = storage_path('app/public/avatars');

        $imageName = $imgFile->resize(1920, 1080, function ($constraint) {
            $constraint->aspectRatio();
        });
        $imageName->crop(400,400);
        $imageName->save($destinationPath . '/' . $input['avatar'], 100);

        return $imageName->basename;
    }

    private function createFileName(){
        return md5(uniqid(rand(), true));
    }
}
