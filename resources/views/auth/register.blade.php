@extends('layouts.app')

@section('title', 'Register page')

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Đăng kí</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input id="name" type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form3Example3">Họ tên</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form3Example3">Email</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form3Example4">Mật khẩu</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input id="password-confirm" type="password" class="form-control  form-control-lg"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <label class="form-label" for="form3Example4">Nhập lại mật khẩu</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng Kí</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
