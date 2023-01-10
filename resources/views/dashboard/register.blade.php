@extends('layout_login')
@section('content')

<div class="center">
    <h1>Register</h1>
    <form method="POST" action="{{route('register.post')}}">
    @csrf


    <div class="login-area">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- alert, register gagal --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="txt_field">
            <input type="email" name="email" required>
            <span></span>
            <label><i class="fa-solid fa-envelope"></i> Email</label>
        </div>
        <div class="txt_field">
            <input type="text" name="name"required>
            <span></span>
            <label><i class="fa-solid fa-person"></i> Nama Lengkap</label>
        </div>
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label><i class="fa-solid fa-user"></i> Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label><i class="fa-solid fa-key"></i> Password</label>
        </div>
        <!-- <div class="pass">Forgot Password?</div> -->
        <!-- <input type="submit" value="Login">  -->
        <button type="submit" value="Login" class="submit">Register</button>
        <div class="signup_link">
          Sudah punya account? <a href="/">Signup</a>
        </div>
    </form>
</div>

@endsection