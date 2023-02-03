@extends('users.layouts.master')
@section('title')
    <title>Account</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection

@section('content')
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="image/image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>

                        <form method="post" action="{{ route('login') }}" id="LoginForm">
                            @csrf
                            <input type="text" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="btn">Login</button>
                            <a href="">Forgot password</a>
                        </form>

                        <form method="post" action="{{ route('register') }}" id="RegForm">
                            @csrf
                            <input type="text" name="name" placeholder="Username">
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            {{-- <input type="text" name="numPhone" placeholder="Number Phone">
                            <input type="text" name="address" placeholder="Address"> --}}
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
