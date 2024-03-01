<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use Share;

class WebsiteController extends Controller
{
    private $latestPosts, $latestPosts2, $topCategories, $categoryPosts, $topPosts, $topPosts2, $topSlidePosts, $posts, $popularPosts, $categories, $post, $videos, $secondAd, $thirdAd, $fourthAd, $fifthAd, $shareFacebook, $shareWhatsapp;

    public function index()
    {
        $this->latestPosts        = Post::where('status',1)->orderBy('id', 'desc')->take(6)->get();
        $this->latestPosts2       = Post::where('status',1)->orderBy('id', 'desc')->take(6)->skip(6)->get();
        $this->topCategories      = Category::where(['status' => 1, 'top_status' => 1])->orderBy('id','desc')->take(3)->get();
        $this->categoryPosts      = Post::where(['status' => 1])->orderBy('id','desc')->get();
        $this->topPosts           = Post::where(['status'=> 1, 'top_status' => 1])->orderBy('id', 'desc')->take(2)->get();
        $this->topPosts2          = Post::where(['status'=> 1, 'top_status' => 1])->orderBy('id', 'desc')->take(2)->skip(2)->get();
        $this->topSlidePosts      = Post::where(['status'=> 1, 'top_status' => 1])->orderBy('id', 'desc')->take(7)->skip(4)->get();
        $this->videos             = Video::where(['status'=> 1])->orderBy('id', 'desc')->take(12)->get();
        $this->secondAd           = Ad::where(['status' => 1, 'home_status' => 1, 'position' => '2'])->get()->first();
        $this->thirdAd            = Ad::where(['status' => 1, 'home_status' => 1, 'position' => '3'])->get()->first();
        $this->fourthAd           = Ad::where(['status' => 1, 'home_status' => 1, 'position' => '4'])->get()->first();
        $this->fifthAd            = Ad::where(['status' => 1, 'home_status' => 1, 'position' => '5'])->get()->first();
        return view('website.home.index', [
            'latestPosts'        => $this->latestPosts,
            'latestPosts2'       => $this->latestPosts2,
            'topCategories'      => $this->topCategories,
            'categoryPosts'      => $this->categoryPosts,
            'topPosts'           => $this->topPosts,
            'topPosts2'          => $this->topPosts2,
            'topSlidePosts'      => $this->topSlidePosts,
            'videos'             => $this->videos,


        ])->with([
            'secondAd' => $this->secondAd,
            'thirdAd'  => $this->thirdAd,
            'fourthAd' => $this->fourthAd,
            'fifthAd'  => $this->fifthAd,
        ]);
    }
    public function category($id)
    {
        $this->posts        = Post::where(['category_id'=> $id, 'status'=>1])->orderBy('id','desc')->get();
        $this->popularPosts = Post::where(['category_id'=> $id, 'status'=>1, 'popular_status'=>1])->orderBy('id','desc')->take(6)->get();
        return view('website.category.index', ['posts' => $this->posts, 'popularPosts' => $this->popularPosts])->with('category',  Category::find($id));
    }

    public function detail($id)
    {
        $this->categories = Category::where('status',1)->get();
        $this->post = Post::find($id);
        $this->comments = Comment::where('post_id', $id)->where('status', 1)->get();
        $this->relatedPosts = Post::where(['status' => 1, 'category_id' => $this->post->category_id])->orderBy('id', 'desc')->take(8)->get();
        //$shareFacebook = Share::page(url('/post'), 'Share title')->facebook()->getUrl();
        //$shareWhatsapp = Share::page(url('/post'), 'I Am Sharing This Post.')->whatsapp()->getUrl();
        //$shareTelegram = Share::page(url('/post'), 'I Am Sharing This Post.')->telegram()->getUrl();
        //dd($shareFacebook, $shareWhatsapp, $shareTelegram);
        //$baseUrl = url('/post');
        //$shareFacebook = "https://www.facebook.com/sharer/sharer.php?u=$baseUrl";
        //$shareWhatsapp = "https://wa.me/?text=$baseUrl";
        //$shareTelegram = "https://telegram.me/share/url?url=$baseUrl&text=I+Am+Sharing+This+Post.";
        $socialShare = Share::page(url('/post'), 'I Am Sharing This Post.')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->pinterest()
            ->telegram()->getRawLinks();
        return view('website.detail.index',[
            'post' => $this->post,
            'categories' => $this->categories,
            'comments' => $this->comments,
            'relatedPosts'=>$this->relatedPosts,
            ], compact('socialShare'));
        //(['shareFacebook'=>$this->shareFacebook, 'shareWhatsapp'=>$this->shareWhatsapp, 'shareTelegram'=>$this->shareTelegram]);
    }
}
