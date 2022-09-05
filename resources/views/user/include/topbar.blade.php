<li class="nav-item">
    <a class="nav-link" href="/">Home</a></a>
</li>
@if (Auth::check())
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Profile</a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
        
        <li><form method="POST" action="{{ route('logout') }}" id="logout">
            @csrf

            <a href="#" class="dropdown-item" onclick="myFunction()">Log out</a></button>
        </form></li>
    </ul>
</li>
@else
@if (\Route::currentRouteName()=='shop.landing'||\Route::currentRouteName()=='place.order.mobile.repair')
<li class="nav-item">
    <a class="nav-link" href="{{route('place.order.mobile.repair',['username'=>$shop->subdomain])}}">Book Order</a></a>
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="{{route('register')}}">Register</a></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('login')}}">Login</a></a>
</li>   
@endif
 
@endif
<li class="nav-item">
    <a class="nav-link" href="{{route('user.orderstatus.index')}}" title="Check Your Order's Status">Check Repair Status</a></a>
</li>
<script>
    function myFunction() {
        document.getElementById("logout").submit();
    }
</script>
