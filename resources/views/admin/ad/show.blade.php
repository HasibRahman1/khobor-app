@extends('admin.master')

@section('title', 'Ads Detail')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ads Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ads</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ads Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Ads Detail Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Ads ID</th>
                            <td>{{$ad->id}}</td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <td><img src="{{asset($ad->image)}}" alt="" height="" width="100%"/></td>
                        </tr>
                        <tr>
                            <th>Ads Source Link</th>
                            <td>{{$ad->ad_link}}</td>
                        </tr>

                        <tr>
                            <th>Ads Position</th>
                            <td>{{$ad->position}}</td>
                        </tr>
                        <tr>
                            <th>Ads on Page</th>
                            <td>{{$ad->home_status == 1 ? 'Home' : ''}}  {{$ad->category_status == 1 ? 'Category' : '' }} {{$ad->detail_status == 1 ? 'Post' : ''}}</td>
                        </tr>

                        <tr>
                            <th>Ads Publication Status</th>
                            <td>{{$ad->status == 1 ? "Published" : "Not Published"}}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


