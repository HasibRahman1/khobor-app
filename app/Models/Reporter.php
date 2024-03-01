<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;
    private static $reporter, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {

        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = "admin/img/reporter-img/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    private static function saveBasicInfo($reporter, $request, $imageUrl)
    {
       $reporter->name          = $request->name;
       $reporter->email         = $request->email;
       $reporter->password      = bcrypt($request->password);
       $reporter->mobile        = $request->mobile;
       $reporter->image         = $imageUrl;
       $reporter->blood_group   = $request->blood_group;
       $reporter->district_name = $request->district_name;
       $reporter->save();
    }

    public static function newReporter($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : 'upload/person.webp';
        self::$reporter = new Reporter();
        self::saveBasicInfo(self::$reporter, $request, self::$imageUrl);
    }
    public static function updateReporter($request, $reporter)
    {
        if ($request->file('image'))
        {
            if (file_exists($reporter->image))
            {
                unlink($reporter->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $reporter->image;
        }
        self::saveBasicInfo($reporter, $request, self::$imageUrl);
    }
    public static function deleteReporter($reporter)
    {
        if (file_exists($reporter->image))
        {
            unlink($reporter->image);
        }
       $reporter->delete();
    }
}
