@extends('backend.auth.auth')

@section('title', 'Login')

@section('content')
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>Login</h2>
                    @if (!$errors->isEmpty())
                        <div class="error_msg">
                            <p>Email/Password is wrong!</p>
                        </div>
                    @endif
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email" id="email" autocomplete="off" autofocus>
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password" id="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="forget">
                        <label for="remember"><input type="checkbox" name="remember" id="remember">Remember Me </label>
                        <a href="{{ route('password.request') }}">Forget Password</a>
                    </div>
                    <button>Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
