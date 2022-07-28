@extends('layouts.app')
@section('body')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        @include('layouts.notification')
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
                                <form method="POST" action="{{ route('login') }}" class="mt-4">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="username" type="text" name="username" placeholder="name@example.com" value="{{ old('username') }}">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" type="Password" name="password" placeholder="password">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            {{-- <a href="{{ route('password.request') }}" class="btn btn-link px-0">Forgot password?</a> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="card col-md-5 text-white bg-primary py-5">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua.</p>
                                    <a href="{{ route('register') }}" class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
