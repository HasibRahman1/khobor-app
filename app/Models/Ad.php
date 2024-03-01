<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    private static $ad, $image, $imageUrl;

    private static function saveBasicInfo($ad, $request, $imageUrl)
    {
        $ad->image               = $imageUrl;
        $ad->position            = $request->position;
        $ad->ad_link             = $request->ad_link;
        $ad->home_status         = $request->home_status;
        $ad->category_status     = $request->category_status;
        $ad->detail_status       = $request->detail_status;
        $ad->status              = $request->status;
        $ad->save();
    }

    public static function newAd($request)
    {
        if($request->file('image'))
        {
            self::$imageUrl = imageUpload($request->file('image'),'admin/img/ad-img/');
        }
        else
        {
            self::$imageUrl = 'admin/img/empty.jpg';
        }
        self::$ad        = new Ad();
        self::saveBasicInfo(self::$ad, $request, self::$imageUrl);
    }

    public static function updateAd($request, $ad)
    {
        if ($request->file('image'))
        {
            if (file_exists($ad->image))
            {
                unlink($ad->image);
            }
            self::$imageUrl = imageUpload($request->file('image'), 'admin/img/ad-img/');
        }
        else
        {
            self::$imageUrl = $ad->image;
        }

        self::saveBasicInfo($ad,$request, self::$imageUrl);
    }

    public static function deleteAd($ad)
    {
        if(file_exists($ad->image)){
            unlink($ad->image);
        }
        $ad->delete();
    }

}
