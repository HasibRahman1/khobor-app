<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $comments, $message;
    public function index()
    {
        $this->comments = Comment::latest()->get();
        return view('admin.comment.index', ['comments' => $this->comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Comment::newComment($request);
        return back()->with('message', 'You Commented Successfully! After checking, admin will published it. Thank You!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function updateStatus($id)
    {
        $this->message = Comment::updatePublishedStatus($id);
        return back()->with('message', $this->message);
    }
}
