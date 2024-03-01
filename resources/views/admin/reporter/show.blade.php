@extends('admin.master')

@section('title', 'Show Reporter')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Reporter Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sub-category.index') }}">Reporter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporter Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Reporter Detail</h3>
                    <div class="ms-auto">
                        <a href="{{ route('reporter.create') }}" class=" btn btn-primary btn-sm m-1" title="Edit">
                            Create New Reporter
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Reporter ID</th>
                            <td>{{$reporter->id}}</td>
                        </tr>
                        <tr>
                            <th>Reporter Name</th>
                            <td>
                                {{$reporter->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Reporter Email</th>
                            <td>
                                {{$reporter->email}}
                            </td>
                        </tr>
                        <tr>
                            <th>Reporter Password</th>
                            <td>
                                {{$reporter->password}}
                            </td>
                        </tr>
                        <tr>
                            <th>Reporter Phone</th>
                            <td>
                                {{$reporter->mobile}}
                            </td>
                        </tr>
                        <tr>
                            <th>Reporter Image</th>
                            <td>
                                <img src="{{asset($reporter->image)}}" alt="" height="140" width="160"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>
                                {{$reporter->blood_group}}
                            </td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>
                                {{$reporter->district_name}}
                            </td>
                        </tr>

                    </table>
                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{ route('reporter.index') }}" class="float-start btn btn-blue btn-sm m-1" title="Back">
                                    <i class="fe fe-arrow-left">Back</i>
                                </a>
                            </div>
                            <div class="float-end d-flex">
                                <a href="{{ route('reporter.edit',$reporter->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                    <i class="fe fe-edit">Edit</i>
                                </a>
                                <form action="{{ route('reporter.destroy',$reporter->id) }}" method="post">
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


