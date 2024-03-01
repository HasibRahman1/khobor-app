@extends('admin.master')

@section('title', 'Edit Photo Album')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Photo Album Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Photo Album</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Photo Album</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Photo Album Form</h3>
                </div>
                <div class="card-body">

                    <h4 class="text-primary">{{session('message')}}</h4>
                    <form class="form-horizontal" action="{{route('photo-album.update',$photoAlbum->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Album Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $photoAlbum->name }}" name="name" id="name" placeholder="Album Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Album Images Image</label>
                            <div class="col-md-9">
                                <input type="file" name="images[]" class="form-control" multiple>
                                @foreach($photoAlbum->photos as $photo)
                                    <img src="{{asset($photo->image)}}" alt="" height="40" width="60"/>
                                @endforeach
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0" type="submit">Update Album</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


