@extends('reporter.master')

@section('title', 'Add Post')

@section('body')

    <!-- start contact-section-layout-1 -->
    <div class="">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-2 mt-25">
                    @include('reporter.includes.wrap')
                </div>

                    <div class="col-xl-9 col-lg-10 wow fadeInUp mt-25 mb-25" data-wow-delay="600ms" data-wow-duration="800ms">
                        <h4 class="text-info">{{session('message')}}</h4>
                        <form action="{{route('reporterPost.store')}}" class="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header" style="background-color: #d9edf7;">
                                    <h5 class="mt-1 mb-1" style="font-size: 20px; color: #0b2f66">ADD POST</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Category Name</label>
                                        <div class="col-md-9">
                                            <select class="form-control" onchange="setSubCategory(this.value)" name="category_id" required >
                                                <option value="" disabled selected> -- Select Category -- </option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Sub Category Name</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="sub_category_id" id="subCategoryId" required>
                                                <option value="" disabled selected> -- Select Sub Category -- </option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option value="{{$sub_category->id}}"> {{$sub_category->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->has('sub_category_id') ? $errors->first('sub_category_id') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="title" class="col-md-3 form-label">Post Title</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="title" name="title" placeholder="Post title" type="text"/>
                                            <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="shortDescription" class="col-md-3 form-label">Short Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="shortDescription" name="short_description" placeholder="Product Short Description" ></textarea>

                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="summernote" class="col-md-3 form-label">Long Description</label>
                                        <div class="col-md-9">
                                            <textarea class="summernote" id="summernote" name="long_description" placeholder="Product Long Description"></textarea>
                                            <span class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                                        </div>
                                    </div>


                                    <div class="row mb-4">
                                        <label for="imgInp" class="col-md-3 form-label">Post Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="image" data-height="200" />

                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-3 form-label">Publication Status</label>
                                        <div class="col-md-9">
                                            <label> <input type="hidden" value="0" checked name="status"><span> Unpublished</span> </label>
                                        </div>
                                    </div>
                                    <input type="hidden" value="0" name="main_status">
                                    <input type="hidden" value="0" name="top_status">
                                    <input type="hidden" value="0" name="popular_status">

                                    <button type="submit" class="mt-5 mb-4 btn rounded-pill float-end" style="background-color: #00c8fa; color: white">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>

                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end contact-section-layout-1 -->

@endsection
