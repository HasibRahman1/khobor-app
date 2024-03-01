<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoAlbum;
use Illuminate\Http\Request;

class PhotoAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $photoAlbum;
    public function index()
    {
        return view('admin.photo-album.index', [
            'photoAlbums' => PhotoAlbum::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photo-album.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:photo_albums,name',
        ], [
            'name.required'         => 'Album name field is required',
            'name.unique'           => 'This Album name is already taken. Please input different name.',
        ]);
       $this->photoAlbum = PhotoAlbum::newPhotoAlbum($request);
        Photo::newPhoto($request->images,$this->photoAlbum->id);
        return back()->with('message', 'New Album created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoAlbum $photoAlbum)
    {
        return view('admin.photo-album.show',['photoAlbum'=>$photoAlbum]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoAlbum $photoAlbum)
    {
        return view('admin.photo-album.edit',['photoAlbum' => $photoAlbum]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoAlbum $photoAlbum)
    {
        if ($photoAlbum->name != $request->name)
        {
            $this->validate($request, [
                'name'          => 'required|unique:photo_albums,name',
            ], [
                'name.required'         => 'Album name field is required',
                'name.unique'           => 'This Album name is already taken. Please input different name.',
            ]);
        }
        PhotoAlbum::updatePhotoAlbum($request,$photoAlbum);
        if ($request->images){
            Photo::updatePhoto($request->images,$photoAlbum->id);
        }

        return redirect('/photo-album')->with('message','Album updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoAlbum $photoAlbum)
    {
        PhotoAlbum::deletePhotoAlbum($photoAlbum);
        Photo::deletePhoto($photoAlbum->id);
        return redirect('/photo-album')->with('message', 'Album deleted successfully');
    }
}
