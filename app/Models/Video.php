<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;
    private static $video;

    private static function saveBasicInfo($video, $request)
    {
        $video->category_id      = $request->category_id;
        $video->title            = $request->title;
        $video->video_link       = $request->video_link;
        if (Str::contains($video->video_link, 'watch?v='))
        {
            $video->converted_video_link = Str::replace('watch?v=','embed/',$video->video_link) ;
        }
        /*
        elseif (Str::contains($video->video_link, 'youtu.be'))
        {
            $video->converted_video_link = Str::replace('youtu.be','youtube.com/embed',$video->video_link) ;
        }

        else
        {
            $video->converted_video_link = 'https://www.youtube.com/embed/1234';
        }
        */
        $video->save();
    }

    public static function newVideo($request)
    {
        self::$video             = new Video();
        if($request->file('image'))
        {
            self::$video->image = imageUpload($request->file('image'),'admin/img/video-img/');
        }
        else
        {
            self::$video->image = 'admin/img/empty.jpg';
        }
        self::saveBasicInfo(self::$video, $request);
    }

    public static function updateVideo($request, $video)
    {
        if($request->file('image'))
        {
            $video->image = imageUpload($request->file('image'),'admin/img/video-img/');
        }
        self::saveBasicInfo($video,$request);
    }

    public static function deleteVideo($video)
    {
        if (file_exists($video->image))
        {
            unlink($video->image);
        }
        $video->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
