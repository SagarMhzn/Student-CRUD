@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>

                            <div>

                                <div class="student_profile" >



                                    <div class="student_info" style="margin:2rem; margin-bottom: 2rem;">
                                        <div style="display: flex; justify-content:space-between">
                                            <p>Current name:</p>
                                            <div class="student-name" style="font-size: 30px; line-height: 20px;">
                                                {{ auth()->user()->name }}
                                            </div>
                                            <p>Current E-mail:</p>
                                            <div class="student-name" style="font-size: 30px; line-height: 20px;">
                                                {{ auth()->user()->email }}
                                            </div>

                                        </div>

                                        <hr>

                                        <div>
                                            <h1>Update Profile</h1>
                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <p class="text-danger"> {{ $error }}</p>
                                                @endforeach
                                            @endif
                                            <form action="/profile-update" method="post">


                                                @csrf
                                                @method('put')

                                                <div class="mb-3">
                                                    Name :
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->name }}" name="name"
                                                        placeholder="Enter your name">
                                                </div>

                                                <div class="mb-3">
                                                    E-mail
                                                    <input type="email" class="form-control"
                                                        value="{{ auth()->user()->email }}" name="email"
                                                        placeholder="Enter your email">
                                                </div>

                                                <button class="btn btn-primary"> Submit</button>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="update-password" style="margin:2rem; margin-bottom: 2rem;">
                                        <h1>Update Password</h1>

                                        <form action="/password-update" method="post">


                                            @csrf
                                            @method('put')

                                            <div class="mb-3">
                                                Old Password :
                                                <input type="password" class="form-control" required
                                                    placeholder="old password" name="old_password">
                                            </div>
                                            <div class="mb-3">
                                                New Password :
                                                <input type="password" class="form-control" required
                                                    placeholder="new-password" name="password">
                                            </div>
                                            <div class="mb-3">
                                                Re-enter new password :
                                                <input type="password" class="form-control" required
                                                    placeholder="confirm password" name="password_confirmation">
                                            </div>


                                            <button class="btn btn-primary"> Update</button>
                                        </form>

                                    </div>
                                    {{-- <h4 style="text-decoration:underline">Contact Info</h4>
                                        <div class="contact-info" style="font-size: 15px; ">
                                            <h5>{{ $data->email }}</h5>
                                            <h5>{{ $data->phone_no }}</h5>
                                            <h5>{{ $data->address }}</h5>
                                        </div>

                                        <div class="gender">
                                            <h6>Gender : {{ $data->gender }}</h6>
                                        </div>
                                        <div class="date-of-birth">
                                            <h6>DoB : {{ $data->dob }}</h6>
                                        </div> --}}



                                </div>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection