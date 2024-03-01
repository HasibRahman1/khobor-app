@extends('reporter.master')

@section('title', 'Manage Post')

@section('body')



    <div class="">
        <div class="container">
            <div class="row justify-content-between">
               <div class="col-xl-3 col-lg-2 mt-25">

               @include('reporter.includes.wrap')

                </div>
                <div class="col-xl-9 col-lg-10 wow fadeInUp mt-25 mb-25" data-wow-delay="600ms" data-wow-duration="800ms">
                    <h4 class="text-info">{{session('message')}}</h4>
                    <div class="card">
                        <div class="mb-0 card-header" style="background-color: #d9edf7;">
                            <h5 class="mt-1 mb-1" style="font-size: 20px; color: #0b2f66">MY POSTS</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                    <th>SL</th>
                                    <th>Post Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reporterPosts as $reporterPost)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $reporterPost->title }}</td>
                                            <td><img src="{{ asset($reporterPost->image) }}" alt="" style="height: 50px ; width: 50px "></td>
                                            <td>{{ $reporterPost->category->name}}</td>
                                            <td>{{ $reporterPost->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                            <td class="d-flex">
                                                <a href="{{route('reporterPost.edit',['id' => $reporterPost->id])}}" class="btn btn-sm m-1 border-0 {{ $reporterPost->status == 1 ? 'disabled' : '' }}" style="background-color: #00c8fa; color: white;" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('reporterPost.delete',['id' => $reporterPost->id])}}" onclick="return confirm('Are you want to delete this !!!')" class="btn btn-danger btn-sm m-1 {{ $reporterPost->status == 1 ? 'disabled' : '' }}" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
        </div>
    </div>


@endsection
