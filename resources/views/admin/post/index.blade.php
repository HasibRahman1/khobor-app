@extends('admin.master')
@section('title','Manage Posts')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Post Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Post</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Post DataTable</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <th>SL</th>
                            <th>Post Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Reporter</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><img src="{{ asset($post->image) }}" alt="" style="height: 50px ; width: 50px "></td>
                                    <td>{{ $post->category->name}}</td>
                                    <td>{{ $post->reporter->name}}</td>
                                    <td>{{ $post->status ==1 ? 'Published' : 'Unpublished' }}<br/>{{ $post->main_status ==1 ? 'Home' : '' }}<br/>{{ $post->breaking_status ==1 ? 'Breaking' : ' ' }}<br/>{{ $post->popular_status ==1 ? 'Popular' : '' }}</td>
                                    <td class="d-flex">
                                        <a href="{{route('post.see', $post->slug)}}" class="btn btn-info btn-sm m-1">
                                            <i class="fe fe-eye"></i>
                                        </a>
                                        <a href="{{route('post.update-status',['id' => $post->id])}}" class="btn {{$post->top_status == '1' ? 'btn-success' : 'btn-warning'}} btn-sm m-1">
                                            <i class="fe fe-arrow-up-circle"></i>
                                        </a>
                                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('post.destroy',$post->id) }}" method="post">
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

