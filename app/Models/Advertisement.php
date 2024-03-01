<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    private static $advertisement;

    private static function saveBasicInfo($advertisement, $request)
    {
        $advertisement->description    = $request->description;
        $advertisement->status         = $request->status;
        $advertisement->save();
    }

    public static function newAdvertisement($request)
    {
        self::$advertisement = new Advertisement();
        self::saveBasicInfo(self::$advertisement, $request);
    }


    public static function updateAdvertisement($request, $advertisement)
    {
        self::saveBasicInfo($advertisement, $request);
    }
}
