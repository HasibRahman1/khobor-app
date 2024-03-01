@extends('admin.master')
@section('title','Manage Post Comments')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Comment Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Comment</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Comment DataTable</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Post Title</th>
                                <th>Visitor Name</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$comment->post->title}}</td>
                                    <td>{{$comment->visitor->name}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td>{{$comment->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('comment.update-status',['id' => $comment->id])}}" class="btn {{$comment->status == '1' ? 'btn-primary' : 'btn-warning'}} btn-sm m-1">
                                            <i class="fe fe-arrow-up-circle"></i>
                                        </a>
                                        <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-1" title="Delete" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fe fe-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

