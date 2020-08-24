@extends('layouts.template')
@section('title')
    <title>Login</title>
@endsection
@section('content')
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{asset('image/signin-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{url('/register')}}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form action="{{ route('login') }}" method="POST" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="email"
                                   placeholder="Your Email" value="{{old('email')}}"
                                   class=" @error('email') is-invalid @enderror"
                            />
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password"
                                   class="@error('password') is-invalid @enderror"
                                   required autocomplete="current-password"/>
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember"
                                   class="agree-term" {{ old('remember') ? 'checked' : '' }}/>
                            <label for="remember" class="label-agree-term btn"><span><span></span></span>Remember
                                Me</label>
                        </div>
                        <div class="form-group">
                            <label class="label-agree-term "><span><span></span></span>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password
                                    </a>
                                @endif
                            </label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
