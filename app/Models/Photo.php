<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    private static $photo, $photos, $image,$imageName,$extension, $directory;

    private static function getImageUrl($image)
    {
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(0,500000) . '.' . self::$extension;
        self::$directory = "admin/img/photo-album-img/";
        $image->move(self::$directory, self::$imageName);
        return self::$directory . self::$imageName;
    }



    public static function newPhoto($images,$id){

        foreach ($images as $image){
            self::$photo = new Photo();
            self::$photo->photo_album_id = $id;
            self::$photo->image = self::getImageUrl($image);
            self::$photo->save();
        }
    }

    public static function updatePhoto($images, $id){

        self::$photos = Photo::where('photo_album_id',$id)->get();
        foreach (self::$photos as $photo ){

            if (file_exists($photo->image)){
                unlink($photo->image);
            }
            $photo->delete();
        }
        self::newPhoto($images, $id);
    }

    public static function deletePhoto($id){

        self::$photos = Photo::where('photo_album_id',$id)->get();
        foreach (self::$photos as $photo ){

            if (file_exists($photo->image)){
                unlink($photo->image);
            }
            $photo->delete();
        }
    }

}
