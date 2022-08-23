@include('authenticate.navbar')

<h3>Dashboard - User</h3>

<p>
  Hi: {{ Auth::guard('web')->user()->name }},  welcome to website welcome
</p>