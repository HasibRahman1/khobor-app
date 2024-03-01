<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Comment extends Model
{
    use HasFactory;
    private static $comment, $message;

    public static function newComment($request)
    {
        self::$comment = new Comment();
        self::$comment->visitor_id = Session::get('visitor_id');
        self::$comment->post_id = $request->post_id;
        self::$comment->comment = $request->comment;
        self::$comment->date = date('Y-m-d');
        self::$comment->save();
    }


    public static function updatePublishedStatus($id)
    {
        self::$comment = Comment::find($id);
        if( self::$comment->status == 1)
        {
            self::$comment->status = 0;
            self::$message = "Comment Info unpublished successfully";
        }
        else
        {
            self::$comment->status = 1;
            self::$message = "Comment Info published successfully";
        }
        self::$comment->save();
        return self:: $message;
    }



    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

}
