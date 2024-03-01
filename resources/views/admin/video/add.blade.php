@extends('admin.master')

@section('title', 'Add Video')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Video Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Video</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Video</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Video Form</h3>
                </div>
                <div class="card-body">

                    <h4 class="text-primary">{{session('message')}}</h4>
                    <form class="form-horizontal" action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value="" disabled selected> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="title" class="col-md-3 form-label">Video Title</label>
                            <div class="col-md-9">
                                <input class="form-control" id="title" value="{{old('title')}}" name="title" placeholder="Video title" type="text"/>
                                <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Video Front Image</label>
                            <div class="col-md-9">
                                <input class="dropify" id="imgInp" name="image" type="file" data-height="200"/>
                                <img src="" id="categoryImage" alt=""/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="videoLink" class="col-md-3 form-label">Video Link </label>
                            <div class="col-md-9">
                                <textarea name="video_link" placeholder="Write Youtube Video Link" id="videoLink" class="form-control"></textarea>
                                <span class="text-danger">{{$errors->has('video_link') ? $errors->first('video_link') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Top Status</label>
                            <div class="col-md-3 pt-2">
                                <label> <input type="radio" value="1" name="top_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="top_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-3 form-label">Popular Status</label>
                            <div class="col-md-3 pt-2">
                                <label> <input type="radio" value="1" name="popular_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="popular_status"><span> No</span> </label>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-2">
                                <label> <input type="radio" value="1" checked name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0" type="submit">Create New Video</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
