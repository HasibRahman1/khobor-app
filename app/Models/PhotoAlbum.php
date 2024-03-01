<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoAlbum extends Model
{
    use HasFactory;

    private static $photoAlbum;

    private static function getImageUrl($image)
    {
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(0,500000) . '.' . self::$extension;
        self::$directory = "admin/img/photoAlbum-img/";
        $image->move(self::$directory, self::$imageName);
        return self::$directory . self::$imageName;
    }


    public static function newPhotoAlbum($request)
    {
        self::$photoAlbum = new PhotoAlbum();
        self::$photoAlbum->name = $request->name;
        self::$photoAlbum->save();
        return self::$photoAlbum;
    }
    public static function updatePhotoAlbum( $request, $photoAlbum)
    {
        $photoAlbum->name               = $request->name;
        $photoAlbum->save();
    }
    public static  function deletePhotoAlbum($photoAlbum)
    {
        $photoAlbum->delete();
    }

    public function Photos()
    {
        return $this->hasMany(Photo::class);
    }


}
