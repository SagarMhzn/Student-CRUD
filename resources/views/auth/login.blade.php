{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">


    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Google Font Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #7d2ae8;
            padding: 30px;
        }

        .container {
            position: relative;
            max-width: 850px;
            width: 100%;
            background: #fff;
            padding: 40px 30px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            perspective: 2700px;
        }

        .container .cover {
            position: absolute;
            top: 0;
            left: 50%;
            height: 100%;
            width: 50%;
            z-index: 98;
            transition: all 1s ease;
            transform-origin: left;
            transform-style: preserve-3d;
        }

        .container #flip:checked~.cover {
            transform: rotateY(-180deg);
        }

        .container .cover .front,
        .container .cover .back {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .cover .back {
            transform: rotateY(180deg);
            backface-visibility: hidden;
        }

        .container .cover::before,
        .container .cover::after {
            content: '';
            position: absolute;
            height: 100%;
            width: 100%;
            background: #7d2ae8;
            opacity: 0.3;
            z-index: 12;
        }

        .container .cover::after {
            opacity: 0;
            transform: rotateY(180deg);
            transition-delay: 1s;
            backface-visibility: hidden;
        }

        .container .cover img {
            position: absolute;
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: 10;
        }

        .container .cover .text {
            position: absolute;
            z-index: 130;
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .cover .text .text-1,
        .cover .text .text-2 {
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            text-align: center;
        }

        .cover .text .text-2 {
            font-size: 15px;
            font-weight: 500;
        }

        .container .forms {
            height: 100%;
            width: 100%;
            background: #fff;
        }

        .container .form-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-content .login-form,
        .form-content .signup-form {
            width: calc(100% / 2 - 25px);
        }

        .forms .form-content .title {
            position: relative;
            font-size: 24px;
            font-weight: 500;
            color: #333;
        }

        .forms .form-content .title:before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 25px;
            background: #7d2ae8;
        }

        .forms .signup-form .title:before {
            width: 20px;
        }

        .forms .form-content .input-boxes {
            margin-top: 30px;
        }

        .forms .form-content .input-box {
            display: flex;
            align-items: center;
            height: 50px;
            width: 100%;
            margin: 10px 0;
            position: relative;
        }

        .form-content .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            padding: 0 30px;
            font-size: 16px;
            font-weight: 500;
            border-bottom: 2px solid rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .form-content .input-box input:focus,
        .form-content .input-box input:valid {
            border-color: #7d2ae8;
        }

        .form-content .input-box i {
            position: absolute;
            color: #7d2ae8;
            font-size: 17px;
        }

        .forms .form-content .text {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .forms .form-content .text a {
            text-decoration: none;
        }

        .forms .form-content .text a:hover {
            text-decoration: underline;
        }

        .forms .form-content .button {
            color: #fff;
            margin-top: 40px;
        }

        .forms .form-content .button input {
            color: #fff;
            background: #7d2ae8;
            border-radius: 6px;
            padding: 0;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .forms .form-content .button input:hover {
            background: #5b13b9;
        }

        .forms .form-content label {
            color: #5b13b9;
            cursor: pointer;
        }

        .forms .form-content label:hover {
            text-decoration: underline;
        }

        .forms .form-content .login-text,
        .forms .form-content .sign-up-text {
            text-align: center;
            margin-top: 25px;
        }

        .container #flip {
            display: none;
        }

        @media (max-width: 730px) {
            .container .cover {
                display: none;
            }

            .form-content .login-form,
            .form-content .signup-form {
                width: 100%;
            }

            .form-content .signup-form {
                display: none;
            }

            .container #flip:checked~.forms .signup-form {
                display: block;
            }

            .container #flip:checked~.forms .login-form {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front" id="front-flip">
                <img src="images/frontImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Every new friend is a <br> new adventure</span>
                    <span class="text-2">Let's get connected</span>
                </div>
            </div>


            <div class="back" id="back-flip">
                <img class="backImg" src="images/backImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Complete miles of journey <br> with one step</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $errors)
                            <h4 class="text-danger " style="color:red;">{{ $errors }}</h4>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Enter your email" type="email"
                                    class="form-control 
                                {{-- @error('email') is-invalid @enderror --}}
                                "
                                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                {{-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter your password" type="password"
                                    class="form-control
                                 {{-- @error('password') is-invalid @enderror --}}
                                 "
                                    name="password" autocomplete="current-password">
                            </div>
                            <br>

                            <div class="text">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="text"><a href="#">Forgot password?</a></div> --}}
                            <br>
                            <div class="text">
                                <div class="">
                                    {{-- <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button> --}}

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Sumbit">
                            </div>
                            <div class="text sign-up-text" id="flip-button">Don't have an account? <label
                                    for="flip">Sigup now</label></div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input id="name" type="text"
                                    class="form-control 
                                {{-- @error('name') is-invalid @enderror --}}
                                "
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Enter your name ">


                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input id="email" type="email"
                                    class="form-control 
                                {{-- @error('email') is-invalid @enderror --}}
                                "
                                    name="email" value="{{ old('email') }}" autocomplete="email"
                                    placeholder="Enter your email" required>

                                {{-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input id="password" type="password"
                                    class="form-control 
                                {{-- @error('password') is-invalid @enderror --}}
                                "
                                    name="password" autocomplete="new-password" placeholder="Enter your password"
                                    required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}

                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password"
                                    placeholder="Enter the password again!" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Sumbit">
                            </div>
                            <div class="text sign-up-text" id="back-button">Already have an account? <label
                                    for="flip">Login now</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var frontButton = document.getElementById('flip-button');
        var frontPage = document.getElementById('front-flip');
        var backButton = document.getElementById('back-button');
        var backSection = document.getElementById('back-flip');

        frontButton.addEventListener('click', function() {
            // frontPage.style.display = 'none';
            frontPage.style.backfaceVisibility = 'hidden';
        })

        backButton.addEventListener('click', function() {
            frontPage.style.display = '';
        })
    </script>
</body>

</html>
