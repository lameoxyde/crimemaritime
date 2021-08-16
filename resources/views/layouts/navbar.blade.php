

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
     
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                  @endif

                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li  style=" margin-right:-7000000px">
                    <a href="{{ route('logout') }}" style="color: rgb(49, 48, 48);"
                   
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ Auth::user()->name }} <i class="fa fa-power-off" aria-hidden="true" style="margin-left: 10px"></i> 
                    </a>
                  

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                                          
                  </li>
                  {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"  style="margin-right: -90px" >
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                       <i class="fa fa-power-off" aria-hidden="true"></i> {{ __('Deconnexion') }}
                    </a>
                  

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div> --}}
              @endguest
          </ul>
      </div>
  </div>
</nav>





