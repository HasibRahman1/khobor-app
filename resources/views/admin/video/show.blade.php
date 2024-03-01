@extends('admin.master')

@section('title', 'Show Video')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Video Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('video.index') }}">Video</a></li>
                <li class="breadcrumb-item active" aria-current="page">Video Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">{{$video->title}} Video Detail</h3>
                    <div class="ms-auto">
                        <a href="{{ route('video.create') }}" class=" btn btn-primary btn-sm m-1" title="Edit">
                            Create New Video
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Video ID</th>
                            <td>{{$video->id}}</td>
                        </tr>
                        <tr>
                            <th>Video Category Name</th>
                            <td>{{$video->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Video Title</th>
                            <td>
                                {{$video->title}}
                            </td>
                        </tr>
                        <tr>
                            <th>Video Front Image</th>
                            <td>
                                <img src="{{asset($video->image)}}" alt="" height="250" width="350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Video Link</th>
                            <td>
                                {{$video->video_link}}
                            </td>
                        </tr>
                        <tr>
                            <th>Video</th>
                            @if($video->video_link == null)
                                <td>

                                </td>
                            @else
                            <td>
                                <iframe width="650" height="400" src="{{asset($video->converted_video_link)}}"></iframe>
                            </td>
                            @endif
                        </tr>

                    </table>

                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{ route('video.index') }}" class="float-start btn btn-blue btn-sm m-1" title="Back">
                                    <i class="fe fe-arrow-left">Back</i>
                                </a>
                            </div>
                            <div class="float-end d-flex">
                                <a href="{{ route('video.edit',$video->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                    <i class="fe fe-edit">Edit</i>
                                </a>
                                <form action="{{ route('video.destroy',$video->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm m-1" title="Delete" onclick="return confirm('Are you want to delete this !!!')">
                                        <i class="fe fe-trash">Delete</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


