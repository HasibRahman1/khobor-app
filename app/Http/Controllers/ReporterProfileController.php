<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reporter;
use App\Models\ReporterPost;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Session;

class ReporterProfileController extends Controller
{
    private $post;

    public function dashboard()
    {
        return view('reporter.post.index', [
            'reporterPosts' => Post::where('reporter_id', Session::get('reporter_id'))->get()

        ]);
    }
    public function create()
    {
        return view('reporter.post.add', [
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
            'sub_category_id'       => 'required',
            'title'                 => 'required',
            'long_description'      => 'required',
        ], [
            'category_id.required'              => 'Category Name field is required',
            'sub_category_id.required'          => 'Sub Category Name field is required',
            'title.required'                    => 'Title field is required',
            'long_description.required'         => 'Long Description field is required',
        ]);
        $this->post = Post::newPost($request);
        return back()->with('message', 'Post info created successfully! Wait for admin to be accepted for publish!');

    }


    public function edit($id)
    {
        return view('reporter.post.edit', [
            'reporterPost' => Post::find($id),
            'categories' => Category::where('status',1)->get(),
            'sub_categories' => SubCategory::where('status',1)->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($request->title == null || $request->long_description == null)
        {
            $this->validate($request, [
                'title'                 => 'required',
                'long_description'      => 'required',
            ], [

                'title.required'                    => 'Title field is required',
                'long_description.required'         => 'Long Description field is required',
            ]);
        }
        $reporterPost = Post::find($id);
        Post::updatePost($request, $reporterPost);
        return redirect('/reporter-dashboard')->with('message', 'Post info updated successfully.');
    }

    public function destroy($id)
    {
        $reporterPost = Post::find($id);
        Post::deletePost($reporterPost);
        return back()->with('message', 'Post info deleted successfully.');
    }

    public function getSubCategoryByCategory()
    {
        $this->subCategories = SubCategory::where('category_id', $_GET['id'])->get();
        return response()->json($this->subCategories);
    }
}
