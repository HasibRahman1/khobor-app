@extends('admin.master')
@section('title','Manage Ad Page')
@section('body')



    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ads Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ads Module</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Ads</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Ads Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Position</th>
                                <th class="border-bottom-0">Page</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ad)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset($ad->image)}}" alt="" height="60" width="80"/></td>
                                    <td>{{$ad->position}}</td>
                                    <td>{{$ad->home_status == 1 ? 'Home' : ''}}  {{$ad->category_status == 1 ? 'Category' : '' }} {{$ad->detail_status == 1 ? 'Post' : ''}}</td>
                                    <td>{{$ad->status == 1 ? 'Published' : 'Unpublished'}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('ad.show', $ad->id)}}" class="btn btn-info btn-sm m-1">
                                            <i class="fe fe-eye"></i>
                                        </a>
                                        <a href="{{route('ad.edit', $ad->id)}}" class="btn btn-primary btn-sm m-1">
                                            <i class="fe fe-edit"></i>
                                        </a>


                                        <form action="{{ route('ad.destroy',$ad->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Are you want to delete this !!!')">
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
