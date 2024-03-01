@extends('admin.master')
@section('title','Setting Terms & Condition')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Terms & Condition Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Terms & Condition Module</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Terms & Condition</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="text-success">{{session('message')}}</h4>
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Terms & Condition Form</h6>
                        <hr/>

                        <form action="{{ route('terms-condition-form.update', $termsCondition->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="summernote" class="form-label"> Terms & Condition</label>
                                <textarea class="form-control" id="summernote"  name="description"  placeholder="Write here">{!! $termsCondition->description !!}</textarea>

                            </div>
                            <div class="col-12">
                                <label class="form-label">Publication Status</label>
                                <label for=""><input type="radio" value="1" {{ $termsCondition->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $termsCondition->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>

                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary m-1">Update Terms & Condition</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

