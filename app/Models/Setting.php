<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    private static $setting, $imageUrl;

    public static function newSetting($request)
    {
        self::$setting = new Setting();
        self::$setting->company_name         = $request->company_name;
        self::$setting->title                = $request->title;
        self::$setting->slogan               = $request->slogan;
        self::$setting->company_description  = $request->company_description;
        self::$setting->contact_phone        = $request->contact_phone;
        self::$setting->contact_email        = $request->contact_email;
        self::$setting->website_link         = $request->website_link;
        self::$setting->facebook_link        = $request->facebook_link;
        self::$setting->twitter_link         = $request->twitter_link;
        self::$setting->linkdln_link         = $request->linkdln_link;
        self::$setting->youtube_link         = $request->youtube_link;
        self::$setting->tiktok_link          = $request->tiktok_link;
        self::$setting->instagram_link       = $request->instagram_link;
        self::$setting->other_link           = $request->other_link;
        self::$setting->google_map_api_link  = $request->google_map_api_link;
        self::$setting->company_address      = $request->company_address;

        if($request->file('logo_jpg'))
        {
            self::$setting->logo_jpg = imageUpload($request->file('logo_jpg'),'upload/setting/');
        }
        else
        {
            self::$setting->logo_jpg = 'admin/img/empty.jpg';
        }
        if($request->file('logo_png'))
        {
            self::$setting->logo_png = imageUpload($request->file('logo_png'),'upload/setting/');
        }
        else
        {
            self::$setting->logo_png = 'admin/img/empty.jpg';
        }

        if($request->file('favicon'))
        {
            self::$setting->favicon = imageUpload($request->file('favicon'),'upload/setting/');
        }
        else
        {
            self::$setting->favicon = 'admin/img/empty.jpg';
        }
        self::$setting->save();

    }

    public static function updateSetting($request, $setting)
    {
        $setting->company_name           = $request->company_name;
        $setting->title                  = $request->title;
        $setting->slogan                 = $request->slogan;
        $setting->company_description    = $request->company_description;
        $setting->contact_phone          = $request->contact_phone;
        $setting->contact_email          = $request->contact_email;
        $setting->website_link           = $request->website_link;
        $setting->facebook_link          = $request->facebook_link;
        $setting->twitter_link           = $request->twitter_link;
        $setting->linkdln_link           = $request->linkdln_link;
        $setting->youtube_link           = $request->youtube_link;
        $setting->instagram_link         = $request->instagram_link;
        $setting->tiktok_link            = $request->tiktok_link;
        $setting->other_link             = $request->other_link;
        $setting->google_map_api_link    = $request->google_map_api_link;
        $setting->company_address        = $request->company_address;

        if($request->file('logo_jpg'))
        {
            $setting->logo_jpg = imageUpload($request->file('logo_jpg'),'upload/setting/');
        }

        if($request->file('logo_png'))
        {
            $setting->logo_png = imageUpload($request->file('logo_png'),'upload/setting/');
        }
        if($request->file('favicon'))
        {
            $setting->favicon = imageUpload($request->file('favicon'),'upload/setting/');
        }
        $setting->save();

    }
}
