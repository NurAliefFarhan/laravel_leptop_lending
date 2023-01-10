@extends('layout_login')
@section('content')
    <div class="center">
      <h1>Login</h1>
      <form method="POST" action="{{route('login.auth')}}">
        @csrf

        @if ($errors->any())
        {{-- alert lending kalau tidak idi isi, akan muncul alert denger  --}}
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    <!-- jika register akan menghasilkan popup ini di login form -->
        <!-- @if(Session::get('success'))
            <div class="alert alert-success w-75">
                {{Session::get('success')}}
            </div>
        @endif -->


        @if(Session::get('success'))
            <div class="alert alert-success w-70">
                {{Session::get('success')}} 
            </div>
        @endif

        <!-- fail, jika gagal login --> 
        @if(Session::get('loginFail'))
            <div class="alert alert-danger w-70">
                {{Session::get('loginFail')}} 
            </div>
        @endif

        {{-- disesuaikan dengan halaman Middleware, sehingga harus login untuk akses todo, tidak bisa http://127.0.0.1:8000/todo --}}
        @if(Session::get('notAllowed'))
            <div class="alert alert-danger w-70">
                {{Session::get('notAllowed')}} 
            </div>
        @endif

        {{-- alert ketika logout  --}}
        @if(Session::get('successLogout'))
          <div class="alert alert-danger w-70">
              {{Session::get('successLogout')}} 
          </div>
        @endif


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
        <!-- <input type="submit" value="Login"> -->
        <button type="submit" value="Login" class="submit">Login</button>
        <div class="signup_link">
          Tidak punya account? <a href="register">Signup</a>
        </div>
      </form>
    </div>
@endsection
