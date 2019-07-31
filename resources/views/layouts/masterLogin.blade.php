<!DOCTYPE html>
<html lang="en">
  <!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 4.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->
  @include('layouts.head')
  <body id="layouts-horizontal">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    @include('layouts.headerLogin')
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        @include('layouts.leftsidebar')
        
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          @include('layouts.message')
          <!--breadcrumbs start-->
          @yield('breadcrumbs')
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            <div class="section">
              @yield('content')
            </div>
            <!-- Floating Action Button -->
            @yield('floatingactionbutton')
            <!-- Floating Action Button -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START RIGHT SIDEBAR NAV-->
        <!--@include('layouts.rightsidebar')-->
        <!-- END RIGHT SIDEBAR NAV-->
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <footer class="page-footer">
      <div class="footer-copyright">
        <div class="container">
          <span>Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-4" href="#" target="_blank">wmorales</a> All rights reserved.</span>
          <span class="right hide-on-small-only">Developed by <a class="grey-text text-lighten-4" href="#">WMORALES</a></span>
        </div>
      </div>
    </footer>
    <!-- END FOOTER -->
    <!-- ================================================
        Scripts
  ================================================ -->
    @yield('scripts')
  </body>
</html>