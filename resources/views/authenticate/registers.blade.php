@include('authenticate.navbar')

<form action="{{ route('registration_submit') }}" method="POST">
    @csrf

    <div>Your Name</div>
    <div>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>Email Address</div>
    <div>
        <input type="text" name="email" value="{{ old('email') }}">
    </div>
    <div>Your Password</div>
    <div>
        <input type="password" name="password" value="">
    </div>
    <div>Repet Passwrod</div>
    <div>
        <input type="password" name="repet_password" value="">
    </div>

   <div style="margin-top:10px;"><input type="submit" name="submit" value="register"></div> 
   
</form>