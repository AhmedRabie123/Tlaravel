@include('Admin.navbar')

<h3>Admin - Dashboard</h3>

<p>
  Hi: {{ Auth::guard('admin')->user()->name }},  welcome to website 
</p>