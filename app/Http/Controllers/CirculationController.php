<?php

namespace App\Http\Controllers;

use App\Models\Circulation;
use Illuminate\Http\Request;

class CirculationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.circulation', ['circulation' => Circulation::latest()->first()]);
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
        Circulation::newCirculation($request);
        return back()->with('message', 'New Information Save Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Circulation $circulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circulation $circulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Circulation $circulation)
    {
        Circulation::updateCirculation($request, $circulation);
        return back()->with('message', 'Info updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Circulation $circulation)
    {
        //
    }
}
