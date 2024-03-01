@extends('admin.master')

@section('title', 'Add Reporter')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Reporter Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Reporter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Reporter</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Reporter Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('reporter.update',$reporter->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-0 mb-4">
                            <label for="name" class="col-md-3 form-label">Reporter Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" name="name" value="{{ $reporter->name }}" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" name="email" value="{{ $reporter->email }}" type="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" id="password" name="password" value="{{ $reporter->password }}" type="password">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">Phone Number</label>
                            <div class="col-md-9">
                                <input class="form-control" id="mobile" name="mobile" value="{{ $reporter->mobile }}" type="number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Reporter Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file"/>
                                <img src="{{asset($reporter->image)}}" id="categoryImage" alt="" height="100" width="100"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="blood_group" class="col-md-3 form-label">Blood Group</label>
                            <div class="col-md-9">
                                <input class="form-control" id="blood_group" name="blood_group" value="{{ $reporter->blood_group }}" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="district_name" class="col-md-3 form-label">District Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="district_name" name="district_name" value="{{ $reporter->district_name }}" type="text">
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0" type="submit">Update Reporter Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



