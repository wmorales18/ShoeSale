<header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">



 <ul class="right">
                        <!-- Authentication Links -->
                        @guest
                           
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>





            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.html" class="brand-logo darken-1">
                    <img src="{{asset('theme/images/logo/materialize-logo.png')}}" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down">Zapateria</span>
                  </a>
                </h1>
              </li>
            </ul>

            <ul class="right hide-on-med-and-down">
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li> 

              </li>
            </ul>
            
            <!--@include('layouts.rightheaderbuttons')
            translation-button 
            @include('layouts.translationbutton')
            notifications-dropdown 
            @include('layouts.notification')
             profile-dropdown 
            @include('layouts.profile')-->





          </div>
        </nav>




        <!-- HORIZONTL NAV START-->
        <nav id="horizontal-nav" class="white hide-on-med-and-down">
          <div class="nav-wrapper">

            <ul id="ul-horizontal-nav" class="left hide-on-med-and-down">              
             
              <li>
                <a class="dropdown-menu" target="_blank" data-activates="Pagesdropdownc">
                  <i class="material-icons">help_outline</i>
                  <span>Ayuda</span>
                </a>
              </li>
            </ul>





          </div>
        </nav>        
        <!-- Pagesdropdown -->
        <ul id="Pagesdropdown" class="dropdown-content dropdown-horizontal-list">          
          <li class="active"><a href="/dashboard">Dashboard</a></li>
        </ul>
          <li class="active"><a href="http://localhost:8000/product">Documentacion</a></li>
        </ul>
      </div>

            <!-- end header nav-->
    </header>