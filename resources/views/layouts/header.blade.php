<header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">
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

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <form id="formUser" style="display: none;">
                    
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     {{Auth::User()->name}}

                                                     {{ __('Logout') }}
                                    </a>
                            
                                      
                                     
                                

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         
                                        @csrf
                                    </form>

                                </div>
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
                <a class="dropdown-menu" href="#" data-activates="Pagesdropdownb">
                  <i class="material-icons">import_contacts</i>
                  <span>Menu</span>
                </a>
              </li>
              <li>
                <a class="dropdown-menu" href="https://pixinvent.ticksy.com" target="_blank" data-activates="Pagesdropdownc">
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
        <ul id="Pagesdropdownb" class="dropdown-content dropdown-horizontal-list">
          <li class="active"><a href="{{route('audit.index')}}">Auditoria</a></li>
          <li class="active"><a href="{{route('supplier.index')}}">Proveedores</a></li>
          <li class="active"><a href="{{route('color.index')}}">Colores</a></li>
          <li class="active"><a href="{{route('typeproduct.index')}}">Tipo Producto</a></li>
          <li class="active"><a href="{{route('size.index')}}">Tamaño</a></li>
          <li class="active"><a href="{{route('shipping.index')}}">Envios</a></li>
          <li class="active"><a href="{{route('typeshipping.index')}}">Tipo Envio</a>
          <li class="active"><a href="{{route('typeactive.index')}}">Tipo Activo</a></li>
          <li class="active"><a href="{{route('typepay.index')}}">Tipo Pago</a></li>
          <li class="active"><a href="{{route('role.index')}}">Roles</a></li>
          <li class="active"><a href="{{route('client.index')}}">Clientes</a></li>
          <li class="active"><a href="{{route('branchoffice.index')}}">Surcusales</a></li
            >
            <li class="active"><a href="{{route('employee.index')}}">Empleados</a></li>
            <li class="active"><a href="{{route('active.index')}}">Activos</a></li>
          <li class="active"><a href="{{route('bill.index')}}">Facturas</a></li>
          <li class="active"><a href="{{route('detailpay.index')}}">Detalle Pago</a></li>
          <li class="active"><a href="{{route('product.index')}}">Productos</a></li>
          <li class="active"><a href="{{route('productinventory.index')}}">Producto Inventario</a></li>
          <li class="active"><a href="{{route('detailbill.index')}}">Detalle Factura</a></li>
          <li class="active"><a href="{{route('shippingproduct.index')}}">Envio Producto</a></li>
        </ul>
        <ul id="Pagesdropdownc" class="dropdown-content dropdown-horizontal-list">          
          <li class="active"><a href="http://localhost:8000/product">Documentacion</a></li>
        </ul>
      </div>

            <!-- end header nav-->
    </header>