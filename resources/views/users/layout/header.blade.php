    <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <h1><a href="{{url('/')}}"><span></span>E-Schedule</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/about')}}">About</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/team')}}">Team</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/teacher')}}">Teacher</a></li>  
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/class')}}">class</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/schedule')}}">schedule</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/contact')}}">Contact</a></li>
          @guest
            @if (Route::has('login'))
            <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/login')}}">Login</a></li>
            @endif
            @if (Route::has('register'))
            <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/register')}}">register</a></li>
            @endif
          @else
          <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->role_access }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @if( Auth::user()->role_access != 'peserta')
                            <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/dashboard')}}">Dashboard</a></li>
                            @endif
                        @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </div>
</header>
<!-- End Header -->