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
                <li class="breadcrumb-item active" aria-current="page">Add Reporter</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Reporter Form</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <form class="form-horizontal" action="{{route('reporter.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-0 mb-4">
                            <label for="reporterName" class="col-md-3 form-label">Reporter Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="reporterName" name="name" placeholder="Reporter Name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="reporterEmail" class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input class="form-control" id="reporterEmail" name="email" placeholder="Reporter's Email Address" type="email">
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="reporterPassword" class="col-md-3 form-label">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" id="reporterPassword" name="password" placeholder="Reporter's User password" type="password">
                                <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="reporterMobile" class="col-md-3 form-label">Phone Number</label>
                            <div class="col-md-9">
                                <input class="form-control" id="reporterMobile" name="mobile" placeholder="Reporter's Phone number" type="number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Reporter Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file" data-height="200"/>
                                <img src="" id="categoryImage" alt=""/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="blood_group" class="col-md-3 form-label">Blood Group</label>
                            <div class="col-md-9">
                                <select class="form-control" name="blood_group">
                                    <option value="" disabled selected> -- Select Blood Group -- </option>
                                    @foreach($blood_groups as $blood_group)
                                        <option value="{{$blood_group}}"> {{$blood_group}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="district_name" class="col-md-3 form-label">District Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="district_name">
                                    <option value="" disabled selected> -- Select District -- </option>
                                        <optgroup label="Dhaka">
                                            @foreach($dhakas as $dhaka)
                                                <option value="{{$dhaka}}"> {{$dhaka}} </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Chittagong">
                                            @foreach($chittagongs as $chittagong)
                                                <option value="{{$chittagong}}"> {{$chittagong}} </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Barishal">
                                            @foreach($barishals as $barishal)
                                                <option value="{{$barishal}}"> {{$barishal}} </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Khulna">
                                            @foreach($khulnas as $khulna)
                                                <option value="{{$khulna}}"> {{$khulna}} </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Rajshahi">
                                            @foreach($rajshahis as $rajshahi)
                                                <option value="{{$rajshahi}}"> {{$rajshahi}} </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Rangpur">
                                            @foreach($rangpurs as $rangpur)
                                                <option value="{{$rangpur}}"> {{$rangpur}} </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Mymensingh">
                                            @foreach($mymensinghs as $mymensingh)
                                                <option value="{{$mymensingh}}"> {{$mymensingh}} </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Sylhet">
                                            @foreach($sylhets as $sylhet)
                                                <option value="{{$sylhet}}"> {{$sylhet}} </option>
                                            @endforeach
                                        </optgroup>

                                </select>

                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0" type="submit">Add New Reporter Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


