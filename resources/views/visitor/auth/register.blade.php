@extends('website.master')

@section('title', 'Login Page')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card mt-45">
                        <div class="card-header text-white" align="center" style="background-color: #00c8fa; font-size: 17px; font-weight: 500;">REGISTER NOW!</div>
                        <div class="card-body">

                            <form action="{{route('user-register')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label style="color: #00c8fa; font-size: 16px; font-weight: 600;">Full Name<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="name" class="form-control" placeholder="Enter Your Full Name" name="name"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label style="color: #00c8fa; font-size: 16px; font-weight: 600;">Email Address<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label style="color: #00c8fa; font-size: 16px; font-weight: 600;">Password<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="password" class="form-control" placeholder="Enter Your Password" name="password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label style="color: #00c8fa; font-size: 16px; font-weight: 600;">Repeat Password</label>
                                    <div class="mt-2">
                                        <input type="password" class="form-control" placeholder="Enter Your Password Again" name="password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class=""></label>
                                    <div class="">
                                        <input type="submit" class="btn rounded-pill text-white" style="background-color: #00c8fa;" value="Register"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <a href="{{route('user-login')}}" style="color: #f05555; font-weight: 600;">Already Have an account? LOGIN THEN!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

@endsection


