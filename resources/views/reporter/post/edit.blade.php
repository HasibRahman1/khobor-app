@extends('reporter.master')

@section('title', 'Edit Post')

@section('body')
    <!-- start contact-section-layout-1 -->
    <div class="">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-1 col-lg-1"></div>

                <div class="col-xl-10 col-lg-10 wow fadeInUp mt-25 mb-25" data-wow-delay="600ms" data-wow-duration="800ms">
                    <h4 class="text-info">{{session('message')}}</h4>

                    <form action="{{ route('reporterPost.update',$reporterPost->id) }}" class="contact-form-style-1" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header" style="background-color: #d9edf7;">
                                <h5 class="mt-1 mb-1" style="font-size: 20px; color: #0b2f66">EDIT POST</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" onchange="setSubCategory(this.value)" name="category_id"  required>
                                            <option value="" disabled selected> -- Select Category -- </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$reporterPost->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Sub Category Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="sub_category_id" id="subCategoryId" required>
                                            <option value="" disabled selected> -- Select Sub Category -- </option>
                                            @foreach($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}" @selected($sub_category->id == $reporterPost->sub_category_id)> {{$sub_category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="title" class="col-md-3 form-label">Post Title</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="title" name="title" value="{{$reporterPost->title}}" type="text"/>

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="shortDescription" class="col-md-3 form-label">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="shortDescription" name="short_description">{{$reporterPost->short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="summernote" class="col-md-3 form-label">Long Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control summernote" id="summernote" name="long_description">{!! $reporterPost->long_description !!}</textarea>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="imgInp" class="col-md-3 form-label">Post Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image" data-height="200" />
                                        <img src="{{ asset($reporterPost->image) }}" height="120" width="100" id="categoryImage" alt=""/>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"></label>
                                    <div class="col-md-9">
                                        @if($reporterPost->status == 0 )
                                         <input type="hidden" value="0" name="status">
                                        @else
                                        <input type="hidden" value="1"  name="status">
                                        @endif
                                    </div>
                                </div>

                                <input type="hidden" value="0" name="main_status">
                                <input type="hidden" value="0" name="top_status">
                                <input type="hidden" value="0" name="popular_status">

                                <button class="mt-1 mb-2 btn rounded-pill float-end" style="background-color: #00c8fa; color: white" type="submit">Update Post</button>

                            </div>
                        </div>

                    </form>

                </div>

                <div class="col-xl-1 col-lg-1"></div>
            </div>
        </div>
    </div>

@endsection
