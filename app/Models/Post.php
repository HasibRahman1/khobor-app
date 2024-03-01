<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;

class Post extends Model
{
    use HasFactory;
    private static $post,$path, $video, $image, $imageName,$videoName, $extension, $directory, $imageUrl, $message;

    private static function getImageUrl($request)
    {

        self::$image            = $request->file('image');
        self::$extension        = self::$image->getClientOriginalExtension();
        self::$imageName        = time().'.'.self::$extension;
        self::$directory        = "admin/img/post-img/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    private static function saveBasicInfo($post, $request, $imageUrl)
    {
        $post->category_id      = $request->category_id;
        $post->sub_category_id  = $request->sub_category_id;
        $post->reporter_id      = $request->reporter_id;
        if ($request->reporter_id == null)
        {
            $post->reporter_id = Session::get('reporter_id');
        }
        $post->title            = $request->title;
        $post->slug             = Str::slug($request->slug, '-');
        if ($request->slug == null)
        {
            $post->slug = Str::slug($request->title.Str::random(1,100), '-');
        }
        $post->long_description  = $request->long_description;

        $post->short_description = $request->short_description;
        if ($request->short_description == null)
        {
            $post->short_description = Str::limit($post->long_description,200,'...');
        }
        $post->image             = $imageUrl;

        //video----------------------------------------------------------------------

        //browse_video
        if ($request->hasFile('browse_video')) {
            $path = $request->file('browse_video')->store('videos', 'public');
            $post->browse_video = $path;
        }
        //video_link
        $post->video_link       = $request->video_link;
        if (Str::contains($post->video_link, 'watch?v='))
        {
            $post->converted_video_link = Str::replace('watch?v=','embed/',$post->video_link) ;
        }
        elseif (Str::contains($post->video_link, 'youtu.be'))
        {
            $post->converted_video_link = Str::replace('youtu.be','youtube.com/embed',$post->video_link) ;
        }
        else
        {
            $post->converted_video_link = 'https://www.youtube.com/embed/1234';
        }

        if ($post->browse_video == null)
        {
            $post->video =  $post->converted_video_link;
        }
        else
        {
            $post->video =  $post->browse_video;
        }

        $post->publish_date      = $request->publish_date;
        $post->main_status       = $request->main_status;
        $post->breaking_status   = $request->breaking_status;
        $post->popular_status    = $request->popular_status;
        $post->status            = $request->status;
        $post->save();
    }
    public static function newPost($request)
    {
        self::$imageUrl         = $request->file('image') ? self::getImageUrl($request) : '';
        self::$post             = new Post();
        self::saveBasicInfo(self::$post, $request, self::$imageUrl);
    }

    private static function updateVideo($post, $request)
    {
        if ($request->hasFile('browse_video')) {
            // Delete the existing video file if it exists
            if ($post->browse_video && file_exists($post->browse_video)) {
                unlink($post->browse_video);
            }

            // Store the new video file
            $videoPath = $request->file('browse_video')->store('videos', 'public');
            $post->browse_video = $videoPath;
        }

        // Update other video-related attributes
        $post->video_link = $request->video_link;
        // ... other video-related updates

        $post->save();
    }
    public static function updatePost($request, $post)
    {
        if (!$post) {
            return;
        }
        if ($request->file('image'))
        {
            if (file_exists($post->image))
            {
                unlink($post->image);
            }
            self::$imageUrl   = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl   = $post->image;
        }

        self::saveBasicInfo($post, $request, self::$imageUrl);
        self::updateVideo($post, $request);

    }

    public static function deletePost($post)
    {
        if (file_exists($post->image))
        {
            unlink($post->image);
        }
        if (file_exists($post->browse_video))
        {
            unlink($post->browse_video);
        }
        $post->delete();
    }

    public static function updateTopStatus($id)
    {
        self::$post = Post::find($id);
        if( self::$post->top_status == 1)
        {
            self::$post->top_status = 0;
            self::$message = "Comment Info unpublished successfully";
        }
        else
        {
            self::$post->top_status = 1;
            Post::where('category_id', self::$post->category_id)->update(['top_status' => 0]);
            self::$message = "Comment Info published successfully";
        }
        self::$post->save();
        return self:: $message;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function reporter()
    {
        return $this->belongsTo(Reporter::class);
    }




}
