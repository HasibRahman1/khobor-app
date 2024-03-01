@extends('admin.master')
@section('title','Website Setting')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Setting Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Setting</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Setting Form</h6>
                        <hr/>

                        <form action="{{ route('setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <label for="companyName" class="col-md-3 form-label">Company Name</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->company_name}}" placeholder="Company Name" id="companyName" name="company_name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="companyTitle" class="col-md-3 form-label">Company Title</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->title}}" placeholder="Company Title" id="companyTitle" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="companySlogan" class="col-md-3 form-label">Company Slogan</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->slogan}}" placeholder="Company Slogan" id="companySlogan" name="slogan" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="companyDescription" class="col-md-3 form-label">Company Description</label>
                                <div class="col-md-9">
                                    <textarea name="company_description" placeholder="Company Description" id="companyDescription" class="form-control" >{{$setting->company_description}}</textarea>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <label for="contactPhone" class="col-md-3 form-label">Contact Phone</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->contact_phone}}" placeholder="Contact Phone" id="contactPhone" name="contact_phone" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="contactEmail" class="col-md-3 form-label">Contact Email</label>
                                <div class="col-md-9">
                                    <input type="email" value="{{$setting->contact_email}}" placeholder="Contact Email" id="contactEmail" name="contact_email" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="websiteLink" class="col-md-3 form-label">Website Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->website_link}}" placeholder="Website Link" id="websiteLink" name="website_link" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="facebookLink" class="col-md-3 form-label">Facebook Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->facebook_link}}" placeholder="Facebook Link" id="facebookLink" name="facebook_link" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="twitterLink" class="col-md-3 form-label">Twitter Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->twitter_link}}"  placeholder="Twitter Link" id="twitterLink" name="twitter_link" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="linkdlnLink" class="col-md-3 form-label">Linkedln Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->linkdln_link}}" placeholder="Linkedln Link" id="linkdlnLink" name="linkdln_link" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="youtubeLink" class="col-md-3 form-label">Youtube Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->youtube_link}}" placeholder="Youtube Link" id="youtubeLink" name="youtube_link" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="otherLink" class="col-md-3 form-label">Another Youtube Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->other_link}}" placeholder="Another Youtube Link" id="otherLink" name="other_link" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="instagramLink" class="col-md-3 form-label">Instagram Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->instagram_link}}" placeholder="Instagram Link" id="instagramLink" name="instagram_link" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="tiktokLink" class="col-md-3 form-label">Tiktok Link</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->tiktok_link}}" placeholder="Tiktok Link" id="tiktokLink" name="tiktok_link" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="googleMapApiLink" class="col-md-3 form-label">Google Map Api Link </label>
                                <div class="col-md-9">
                                    <textarea name="google_map_api_link" placeholder="Google Map Api Link" id="googleMapApiLink" class="form-control" >{{$setting->google_map_api_link}}</textarea>
                                </div>

                            </div>

                            <div class="row mb-4">
                                <label for="companyAddress" class="col-md-3 form-label">Company Address</label>
                                <div class="col-md-9">
                                    <textarea name="company_address" placeholder="Company Address" id="companyAddress" class="form-control" >{{$setting->company_address}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="logoPng" class="col-md-3 form-label">Logo PNG</label>
                                <div class="col-md-9">
                                    <input class="dropify" data-height="200" id="logoPng" name="logo_png" type="file"/>
                                    <img src="{{asset($setting->logo_png)}}" alt="" height="150"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="logoJpg" class="col-md-3 form-label">Logo JPG</label>
                                <div class="col-md-9">
                                    <input class="dropify" data-height="200" id="logoJpg" name="logo_jpg" type="file"/>
                                    <img src="{{asset($setting->logo_jpg)}}" alt="" height="150"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="favicon" class="col-md-3 form-label">Logo Favicon</label>
                                <div class="col-md-9">
                                    <input class="dropify" data-height="200" id="favicon" name="favicon" type="file"/>
                                    <img src="{{asset($setting->favicon)}}" alt="" height="150"/>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary rounded-0">Update Information</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

