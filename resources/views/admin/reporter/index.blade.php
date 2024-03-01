@extends('admin.master')
@section('title','Manage Reporters')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Reporter Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Reporter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Reporters</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Reporters DataTable</h3>
                </div>

                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <th>SL</th>
                            <th>Reporter Name</th>
                            <th>Email</th>
                            <th>Phone no.</th>
                            <th>Image</th>
                            <th>Blood Group</th>
                            <th>District Name</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($reporters as $reporter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $reporter->name }}</td>
                                    <td>{{ $reporter->email }}</td>
                                    <td>{{ $reporter->mobile }}</td>
                                    <td><img src="{{asset($reporter->image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{ $reporter->blood_group }}</td>
                                    <td>{{ $reporter->district_name }}</td>
                                    <td class="d-flex">
                                        <a href="{{route('reporter.show',$reporter->id)}}" class="btn btn-info btn-sm m-1">
                                            <i class="fe fe-eye"></i>
                                        </a>
                                        <a href="{{ route('reporter.edit',$reporter->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('reporter.destroy',$reporter->id) }}" method="post">
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

