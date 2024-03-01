@extends('website.master')
@section('title','Advertisement')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-50 mb-50">
                <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                    {!! $advertisement->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection
