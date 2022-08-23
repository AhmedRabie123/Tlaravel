@include('authenticate.navbar')

<form action="{{ route('forget_password_submit') }}" method="POST">
    @csrf

    <div>Email Address</div>
    <div>
        <input type="text" name="email" value="">
    </div>

    <div style="margin-top:10px;"> <input type="submit" value="submit">
        <br>
        <a href="{{ route('login') }}">back to login page</a>
    </div>


</form>
