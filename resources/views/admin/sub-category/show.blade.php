@extends('admin.master')

@section('title', 'Show Sub Category')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sub-category.index') }}">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Category Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Sub Category Detail</h3>
                    <div class="ms-auto">
                        <a href="{{ route('sub-category.create') }}" class=" btn btn-primary btn-sm m-1" title="Edit">
                            Create New Sub Category
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Sub Category ID</th>
                            <td>{{$sub_category->id}}</td>
                        </tr>
                        <tr>
                            <th>Sub Category Name</th>
                            <td>
                                {{$sub_category->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>
                                {{$sub_category->category->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>
                                {{$sub_category->description}}
                            </td>
                        </tr>
                        <tr>
                            <th>Sub Category Image</th>
                            <td>
                                <img src="{{asset($sub_category->image)}}" alt="" height="140" width="160"/>

                            </td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{$sub_category->status == 1 ? "Published" : "Not Published"}}</td>
                        </tr>

                    </table>
                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{ route('sub-category.index') }}" class="float-start btn btn-blue btn-sm m-1" title="Back">
                                    <i class="fe fe-arrow-left">Back</i>
                                </a>
                            </div>
                            <div class="float-end d-flex">
                                <a href="{{ route('sub-category.edit',$sub_category->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                    <i class="fe fe-edit">Edit</i>
                                </a>
                                <form action="{{ route('sub-category.destroy',$sub_category->id) }}" method="post">
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


