@extends('admin.master')

@section('title', 'Manage Sub Category')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Sub Category Info</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Sub Category Name</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{isset($sub_category->category->name) ? $sub_category->category->name : ' '}}</td>
                                    <td>{{$sub_category->name}}</td>
                                    <td><img src="{{asset($sub_category->image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{$sub_category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('sub-category.show',$sub_category->id)}}" class="btn btn-info btn-sm m-1">
                                            <i class="fe fe-eye"></i>
                                        </a>
                                        <a href="{{route('sub-category.edit', $sub_category->id)}}" class="btn btn-primary btn-sm m-1" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{route('sub-category.destroy', $sub_category->id)}}" method="post">
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

