@extends('admin.master')

@section('title', 'Show Post')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Post Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">{{$post->title}} Detail Content</h3>
                    <div class="ms-auto">
                        <a href="{{ route('post.create') }}" class=" btn btn-primary btn-sm m-1" title="Edit">
                            Create New Post
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Post ID</th>
                            <td>{{$post->id}}</td>
                        </tr>
                        <tr>
                            <th>Post Category</th>
                            <td>{{$post->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Post Sub Category</th>
                            @if($post->sub_category_id == null)
                                <td></td>
                            @else
                            <td>
                                {{$post->subCategory->name}}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            <th>Post Reporter</th>
                            <td>
                                {{$post->reporter->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Post Title</th>
                            <td>
                                {{$post->title}}
                            </td>
                        </tr>
                        <tr>
                            <th>Post Slug</th>
                            <td>
                                {{$post->slug}}
                            </td>
                        </tr>
                        <tr>
                            <th>Post Image</th>
                            <td>
                                <img src="{{asset($post->image)}}" alt="" height="130" width="150"/>
                            </td>
                        </tr>

                        <tr>
                            <th>Short Description</th>
                            <td>{!!$post->short_description!!}</td>
                        </tr>
                        <tr>
                            <th>Long Description</th>
                            <td>{!!$post->long_description  !!}</td>
                        </tr>
                        <tr>
                            <th>Video Link</th>
                            <td>
                                {{$post->video_link}}
                            </td>
                        </tr>
                        <tr>
                            <th>Video</th>
                            @if($post->video_link == null && $post->browse_video == null)
                                <td></td>
                            @else
                                @if($post->video_link == null)
                                    <td>
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </td>
                                @else
                                <td>
                                    <iframe width="650" height="400" src="{{asset($post->video)}}"></iframe>
                                </td>
                                @endif
                            @endif
                        </tr>

                        <tr>
                            <th>Main Status</th>
                            <td>{{$post->main_status == 1 ? "Main" : "Not Main"}}</td>
                        </tr>
                        <tr>
                            <th>Top Status</th>
                            <td>{{$post->top_status == 1 ? "Top" : "Not Top"}}</td>
                        </tr>
                        <tr>
                            <th>Popular Status</th>
                            <td>{{$post->popular_status == 1 ? "Popular" : "Not Popular"}}</td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{$post->status == 1 ? "Published" : "Not Published"}}</td>
                        </tr>

                    </table>

                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{ route('post.index') }}" class="float-start btn btn-blue btn-sm m-1" title="Back">
                                    <i class="fe fe-arrow-left">Back</i>
                                </a>
                            </div>
                            <div class="float-end d-flex">
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                    <i class="fe fe-edit">Edit</i>
                                </a>
                                <form action="{{ route('post.destroy',$post->id) }}" method="post">
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

