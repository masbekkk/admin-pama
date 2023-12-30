@extends('layouts.app')
@section('title')
    Login Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset('logo/logopama.png') }}" alt="logo" width="100"
                    class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Login</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="form_login" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" tabindex="1" value="{{ old('email') }}" required autocomplete="email" 
                                autofocus>
                            <div class="valid-feedback">
                                Email Sudah Diisi!
                            </div>
                            @error('email')
                                <div class="invalid-feedback " role="alert">
                                    {{ $message }}
                                </div>
                            @else
                                <div class="invalid-feedback emailError">
                                    Email Wajib Diisi Sesuai Format!
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                                {{-- @if (Route::has('password.request'))
                                    <div class="float-right">
                                        <a href="auth-forgot-password.html" class="text-small">
                                            Lupa Password?
                                        </a>
                                    </div>
                                @endif --}}
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2"
                                autocomplete="current-password" required>
                            <div class="valid-feedback">
                                Password Sudah Diisi!
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                  
                                    {{ $message }}
                                </span>
                            @else
                                <div class="invalid-feedback passwordError">
                                    Password Wajib Diisi!
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                    id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="mt-5 text-muted text-center">
                Belum Punya Akun? <a href="{{ route('register') }}">Buat Akun</a>
            </div> --}}
            <div class="simple-footer">
                Copyright &copy;  <script>
                    document.write(new Date().getFullYear())
                </script> <a href="https://pamapersada.com/#"><text>Pamapersada
                </text></a> All rights reserved.
                
            </div>
        </div>
    </div>
@endsection
