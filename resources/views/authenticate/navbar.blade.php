<a href="{{ route('home') }}">Home</a> -

@if (Auth::guard('web')->user())

    {{-- @if (Auth::guard('web')->user()->role == 1)
        <a href="{{ route('dashboard_admin') }}">Dashboard</a> -
        <a href="{{ route('setting') }}">settings</a> -
    @endif --}}

    {{-- @if (Auth::guard('web')->user()->role == 2)
        <a href="{{ route('dashboard_user') }}">Dashboard</a> -
    @endif --}}

    
    <a href="{{ route('dashboard_user') }}">Dashboard</a> -
    <a href="{{ route('logout') }}">Logout</a>

    @if (!Auth::guard('web')->user())
        <a href="{{ route('login') }}">Login</a> -
        <a href="{{ route('register') }}">register</a>
    @endif
@endif
<br><br><br>
