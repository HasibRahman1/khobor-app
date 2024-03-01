@extends('admin.master')

@section('title', 'Show Photo Album')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Photo Album Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('photo-album.index') }}">Photo Album</a></li>
                <li class="breadcrumb-item active" aria-current="page">Photo Album Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">{{$photoAlbum->name}} Album Detail</h3>
                    <div class="ms-auto">
                    <a href="{{ route('photo-album.create') }}" class=" btn btn-primary btn-sm m-1" title="Edit">
                        Create New Album
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Album ID</th>
                            <td>{{$photoAlbum->id}}</td>
                        </tr>
                        <tr>
                            <th>Album Name</th>
                            <td>
                                {{$photoAlbum->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Photo Album Images</th>
                            <td>
                                @foreach($photoAlbum->photos as $photo)
                                    <img src="{{asset($photo->image)}}" alt="" height="140" width="160"/>
                                @endforeach

                            </td>
                        </tr>

                    </table>
                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{ route('photo-album.index') }}" class="float-start btn btn-blue btn-sm m-1" title="Back">
                                    <i class="fe fe-arrow-left">Back</i>
                                </a>
                            </div>
                            <div class="float-end d-flex">
                                <a href="{{ route('photo-album.edit',$photoAlbum->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                    <i class="fe fe-edit">Edit</i>
                                </a>
                                <form action="{{ route('photo-album.destroy',$photoAlbum->id) }}" method="post">
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

