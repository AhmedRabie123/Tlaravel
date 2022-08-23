@include('authenticate.navbar')

<h2>Reset Password</h2>

<form action="{{ route('reset_password_submit') }}" method="POST">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">


    <div>New Password</div>
    <div>
        <input type="password" name="new_password" value="">
    </div>
    <div>Retyep Password</div>
    <div>
        <input type="password" name="retyep_password" value="">
    </div>

    <div style="margin-top:10px;"> <input type="submit" value="update"></div>

</form>
