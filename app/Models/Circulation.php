<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circulation extends Model
{
    use HasFactory;
    private static $circulation;

    private static function saveBasicInfo($circulation, $request)
    {
        $circulation->description    = $request->description;
        $circulation->status         = $request->status;
        $circulation->save();
    }

    public static function newCirculation($request)
    {
        self::$circulation = new Circulation();
        self::saveBasicInfo(self::$circulation, $request);
    }


    public static function updateCirculation($request, $circulation)
    {
        self::saveBasicInfo($circulation, $request);
    }
}
