@extends('admin.master')
@section('title','Add Ads  Page')
@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ad  Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ad </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Ad </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Ad Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('ad.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Ad Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file"/>
                                <img src="" id="categoryImage" alt="" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Position</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('position') }}" name="position" id="position" placeholder="Ads position" type="number"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="adLink" class="col-md-3 form-label">Source Link </label>
                            <div class="col-md-9">
                                <input class="form-control" name="ad_link" id="adLink" placeholder="Ad Source link" type="text" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Home Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" name="home_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="home_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-1"></label>
                            <label class="col-md-2 form-label">Category Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" name="category_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="category_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-1"></label>
                            <label class="col-md-2 form-label">Detail Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" name="detail_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" checked name="detail_status"><span> No</span> </label>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label for=""><input type="radio" value="1" name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" checked name="status"><span> Unpublished </span></label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Ad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
