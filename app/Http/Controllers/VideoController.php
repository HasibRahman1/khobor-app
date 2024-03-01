<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.video.index', [
            'videos' => Video::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.add', [
            'categories' => Category::where('status',1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'                 => 'required',
            'video_link'            => ['required', function ($attribute, $value, $fail) {
                if (!Str::contains($value, 'watch?v=')) {
                    $fail('The video link must be youtube URL');
                }
            }],

        ], [
            'title.required'                    => 'Title field is required',
            'video_link.required'              => 'Video Link field is required',

        ]);

        Video::newVideo($request);
        return back()->with('message', 'Video info created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('admin.video.show',['video' => $video]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.video.edit', [
            'video' => $video,
            'categories' => Category::where('status',1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        if ($request->title == null || $request->video_link == null)
        {
            $this->validate($request, [
                'title'                 => 'required',
                'video_link'            => 'required',
            ], [
                'title.required'                    => 'Title field is required',
                'video_link.required'              => 'Video Link field is required',
            ]);
        }
        Video::updateVideo($request, $video);
        return redirect('/video')->with('message', 'Video info updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        Video::deleteVideo($video);
        return redirect('/video')->with('message', 'Video info deleted successfully!');
    }
}
