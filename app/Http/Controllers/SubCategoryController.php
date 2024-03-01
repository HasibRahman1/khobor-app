<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sub-category.index', ['sub_categories' => SubCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sub-category.add', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'   => 'required',
            'name'          => 'required|unique:sub_categories,name',
        ], [
            'category_id.required'  => 'Category name field is required',
            'name.required'         => 'Sub Category name field is required',
            'name.unique'           => 'This Sub Category name is already taken. Please input different name.',
        ]);

        SubCategory::newSubCategory($request);
        return back()->with('message', 'Sub category info created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        return view('admin.sub-category.show',['sub_category'=>$subCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        return view('admin.sub-category.edit', ['categories' => Category::all(), 'sub_category' => $subCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        if ($subCategory->name != $request->name)
        {
            $this->validate($request, [
                'name'          => 'required|unique:sub_categories,name',
            ], [
                'name.required'         => 'Sub Category name field is required',
                'name.unique'           => 'This Sub Category name is already taken. Please input different name.',
            ]);
        }
        SubCategory::updateSubCategory($request, $subCategory);
        return redirect('/sub-category')->with('message', 'Sub category info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        SubCategory::deleteSubCategory($subCategory);
        return redirect('/sub-category')->with('message', 'Sub category info deleted successfully.');
    }
}
