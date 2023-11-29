@extends('layouts.app')

@section('title', 'Login Page')

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Đăng Nhập</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="email" id="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form1Example13">Email</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form1Example23">Mật Khẩu</label>
                                </div>
                                <div class="d-flex justify-content-around align-items-center mb-4">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Quên mật khẩu ?
                                        </a>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-danger btn-lg btn-block">Đăng Nhập</button>
                                <hr class="my-4">
                                <a class="btn btn-primary btn-lg btn-block" href="{{ url('/register') }}">Tạo tài khoản mới</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
