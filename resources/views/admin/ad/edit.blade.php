@extends('admin.master')
@section('title','Edit Ads Page')
@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ad  Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ad </a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Ad </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Ad Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('ad.update', $ad->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Ad Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image"  type="file"/>

                                <img src="{{ asset($ad->image) }}" alt="" height="60" width="80" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Position</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$ad->position}}" name="position" id="position" placeholder="Ads position" type="number"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="adLink" class="col-md-3 form-label">Source Link </label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$ad->ad_link}}" name="ad_link" id="adLink" placeholder="Ad Source link" type="text" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Home Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" {{$ad->home_status == 1 ? 'checked' : ''}} name="home_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" {{$ad->home_status == 0 ? 'checked' : ''}} name="home_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-1"></label>
                            <label class="col-md-2 form-label">Category Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" {{$ad->category_status == 1 ? 'checked' : ''}} name="category_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" {{$ad->category_status == 0 ? 'checked' : ''}} name="category_status"><span> No</span> </label>
                            </div>
                            <label class="col-md-1"></label>
                            <label class="col-md-2 form-label">Detail Status</label>
                            <div class="col-md-1 pt-2">
                                <label> <input type="radio" value="1" {{$ad->detail_status == 1 ? 'checked' : ''}} name="detail_status"><span> Yes</span> </label>
                                <label> <input type="radio" value="0" {{$ad->detail_status == 0 ? 'checked' : ''}} name="detail_status"><span> No</span> </label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label for=""><input type="radio" value="1" {{ $ad->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $ad->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Edit New Ad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

