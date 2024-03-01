@extends('admin.master')
@section('title','Setting Advertisement')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Advertisement Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Advertisement Module</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Advertisement</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Advertisement Form</h6>
                        <hr/>

                        <form action="{{ route('advertisement-form.update', $advertisement->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="summernote" class="form-label">Advertisement</label>
                                <textarea class="form-control" id="summernote"  name="description"  placeholder="Write here">{!! $advertisement->description !!}</textarea>

                            </div>
                            <div class="col-12">
                                <label class="form-label">Publication Status</label>
                                <label for=""><input type="radio" value="1" {{ $advertisement->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $advertisement->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>

                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary m-1">Update Advertisement Info</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
