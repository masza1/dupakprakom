@extends('layouts.app')
@section('body')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4 mx-4">
                        @include('layouts.notification')
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-medium-emphasis">Create your account</p>
                            <form method="POST" action="{{ route('register') }}" class="mt-4">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" type="text" name="username" placeholder="" value="{{ old('username') }}">
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="" value="{{ old('email') }}">
                                    <label for="email">Email / Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="" value="{{ old('password') }}">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="" value="{{ old('password_confirmation') }}">
                                    <label for="password_confirmation">Password Konfirmasi</label>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
