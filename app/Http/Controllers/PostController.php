<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Reporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $slug;

    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.add', [
            'categories' => Category::where('status',1)->get(),
            'sub_categories' => SubCategory::where('status',1)->get(),
            'reporters' => Reporter::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'           => 'required',
            'reporter_id'           => 'required',
            'title'                 => 'required',
            'slug'                  => 'unique:posts,slug',
            'long_description'      => 'required',
            'browse_video'          => 'file|mimes:mp4,avi,wmv|max:10240'
        ], [
            'category_id.required'              => 'Category Name field is required',
            'Reporter_id.required'              => 'Reporter Name field is required',
            'title.required'                    => 'Title field is required',
            'slug.unique'                       => 'This slug is already taken. Please input different slug.',
            'long_description.required'         => 'Long Description field is required',
        ]);

        Post::newPost($request);
        return back()->with('message', 'Post info created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post' => $post,
            'categories' => Category::where('status',1)->get(),
            'sub_categories' => SubCategory::where('status',1)->get(),
            'reporters' => Reporter::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Post $post)
    {

        if ($post->slug != $request->slug)
        {
            $this->validate($request, [
                'slug'            => 'unique:posts,slug',
            ], [

                'slug.unique'      => 'This slug is already taken. Please input different slug.',
            ]);
        }
        elseif ($request->title == null || $request->long_description == null)
        {
            $this->validate($request, [
                'title'                 => 'required',
                'long_description'      => 'required',
            ], [

                'title.required'                    => 'Title field is required',
                'long_description.required'         => 'Long Description field is required',
            ]);
        }
        elseif ($request->browse_video != null)
        {
            $this->validate($request, [
                'browse_video' => 'file|mimes:mp4,avi,wmv|max:10240',
            ]);
        }

        Post::updatePost($request, $post);
        return redirect('/post')->with('message', 'Post info updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::deletePost($post);
        return redirect('/post')->with('message', 'Post info deleted successfully!');
    }
    public function getSubCategoryByCategory()
    {
        $this->subCategories = SubCategory::where('category_id', $_GET['id'])->get();
        return response()->json($this->subCategories);
    }

    public function updateStatus($id)
    {
        $this->message = Post::updateTopStatus($id);
        return back()->with('message', $this->message);
    }

}
