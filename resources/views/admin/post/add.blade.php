@extends('admin.master')

@section('title', 'Add Post')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Post Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Post Form</h3>
                </div>
                <div class="card-body">

                    <h4 class="text-primary">{{session('message')}}</h4>
                    <form class="form-horizontal" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control"  onchange="setSubCategory(this.value)" name="category_id" required>
                                    <option value="" disabled selected> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Sub Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                    <option value="" disabled selected> -- Select Sub Category -- </option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}"> {{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Reporter Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="reporter_id" required>
                                    <option value="" disabled selected> -- Select Reporter -- </option>
                                    @foreach($reporters as $reporter)
                                        <option value="{{$reporter->id}}"> {{$reporter->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('reporter_id') ? $errors->first('reporter_id') : ''}}</span>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="title" class="col-md-3 form-label">Post Title</label>
                            <div class="col-md-9">
                                <input class="form-control" id="title" value="{{old('title')}}" name="title" placeholder="Post title" type="text"/>
                                <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slug" class="col-md-3 form-label">Post Slug</label>
                            <div class="col-md-9">
                                <input class="form-control" id="slug" value="{{old('slug')}}" name="slug" placeholder="Post slug" type="text"/>
                                <span class="text-danger">{{$errors->has('slug') ? $errors->first('slug') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="shortDescription" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="shortDescription" name="short_description" placeholder="Post Short Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" name="long_description" placeholder="Post Long Description"></textarea>
                                <span class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Post Image</label>
                            <div class="col-md-9">
                                <input class="dropify" id="imgInp" name="image" type="file" data-height="200"/>
                                <img src="" id="categoryImage" alt=""/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Video </label>
                            <div class="col-md-3">
                                <input class="form-control" name="video_link" placeholder="Video link" type="text" />
                            </div>
                            <label class="col-md-1 text-center pt-2"> OR </label>
                            <label class="col-md-2 form-label">Upload Video </label>
                            <div class="col-md-3 pt-2">
                                <input name="browse_video" type="file" accept="video/*"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="publishDate" class="col-md-3 form-label">Publish Date</label>
                            <div class="col-md-9">
                                <input class="form-control" id="publishDate" value="{{old('publish_date')}}" name="publish_date" placeholder="Post slug" type="datetime-local"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Main Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" name="main_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="main_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-1"></label>
                            <label class="col-md-2 form-label">Breaking Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" name="breaking_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="breaking_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-1"></label>
                            <label class="col-md-2 form-label">Popular Status</label>
                            <div class="col-md-1 pt-2">
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
                        <button class="btn btn-primary rounded-0" type="submit">Create New Post</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
