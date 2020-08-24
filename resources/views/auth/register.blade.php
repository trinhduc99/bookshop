@extends('layouts.template')
@section('title')
    <title>Register Account</title>
@endsection
@section('content')
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form action="{{ route('register') }}" method="POST" class="register-form" id="register-form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name"
                                   placeholder="Your Name" value="{{ old('name') }}"
                                   class="@error('name') is-invalid @enderror"
                                   required autocomplete="name" autofocus/>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email"
                                   placeholder="Your Email" value="{{ old('email') }}"
                                   class="@error('email') is-invalid @enderror"
                                   required autocomplete="email"
                            />
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password"
                                   placeholder="Password" required autocomplete="new-password"
                                   class="@error('password') is-invalid @enderror"
                            />
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="password-confirm"
                                   placeholder="Repeat your password"
                                   required autocomplete="new-password"
                            />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" value="unchecked" name="agree-term" id="agree-term" class="agree-term"/>
                            <label for="agree-term" class="label-agree-term" style="font-size: 14px"><span><span></span></span>I
                                agree all
                                statements in</label>
                            <a style="background-color: #7EBE9B; font-size: 16px" class="term-service" data-toggle="modal"
                               data-target="#showModal">Terms of service
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="showModal" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Điều khoản dịch vụ</h3>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Bạn có đồng ý nếu công nhận mình đẹp trai @@@</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('image/signup-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{route('login')}}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
@endsection

