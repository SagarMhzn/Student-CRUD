@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>

                            <div>

                                <div class="student_profile" >
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                          <a class="nav-link "  href="{{ route('user.profile') }}">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link active" aria-current="page" href="#">Link</a>
                                        </li>
                                        
                                    </ul>


                                    <div class="student_info" style="margin:2rem; margin-bottom: 2rem;">
                                        <div >
                                            <p>Current name:</p>
                                            <div class="student-name" style="font-size: 30px; margin-top:-1rem">
                                                {{ auth()->user()->name }}
                                            </div>
                                            <p>Current E-mail:</p>
                                            <div class="student-name" style="font-size: 30px; margin-top:-1rem">
                                                {{ auth()->user()->email }}
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="update-password" style="margin:2rem; margin-bottom: 2rem;">
                                            <h1>Update Password</h1>
    
                                            <form action="/password-update" method="post">
                                                @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <p class="text-danger"> {{ $error }}</p>
                                                @endforeach
                                            @endif
    
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

                                    </div>
                                    



                                </div>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
