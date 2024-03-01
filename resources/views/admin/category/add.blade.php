@extends('admin.master')

@section('title', 'Add Category')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Category Form</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <form class="form-horizontal" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-0 mb-4">
                            <label for="catName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('name')}}" id="catName" name="name" placeholder="Category Name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="catDescription" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="catDescription" placeholder="Category Description" name="description">{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" id="imgInp" name="image" data-height="200" />
                                <img src="" id="categoryImage" alt=""/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Home Status</label>
                            <div class="col-md-3 pt-2">
                                <label> <input type="radio" value="1" name="home_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="home_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-3 form-label">Top Status</label>
                            <div class="col-md-3 pt-2">
                                <label> <input type="radio" value="1" name="top_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="top_status"><span> No</span> </label>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-2">
                                <label> <input type="radio" value="1" checked name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0" type="submit">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


