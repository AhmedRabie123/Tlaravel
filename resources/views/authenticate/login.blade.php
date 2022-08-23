@include('authenticate.navbar')

<form action="{{ route('login_submit') }}" method="POST">
    @csrf

    <div>Email Address</div>
    <div>
        <input type="text" name="email" value="{{ old('email') }}">
    </div>
    <div>Your Password</div>
    <div>
        <input type="password" name="password" value="">
    </div>

    <div style="margin-top:10px;"> <input type="submit" value="login">
        <br>
        <a href="{{ route('forget_password') }}">forget-passsword</a>
    </div>


</form>
