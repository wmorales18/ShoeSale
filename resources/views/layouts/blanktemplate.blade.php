@extends('layouts.master')

@section('page_styles')
@endsection

@section('breadcrumbs')
<div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
  </div>
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title">Dashboard</h5>
        <ol class="breadcrumbs">
          <li><a href="index.html">Dashboard</a></li>
        </ol>
      </div>
   
    </div>
  </div>
</div>
@endsection

@section('content')

<div class="divider"></div>
@endsection

@section('scripts')
<!-- jQuery Library -->
    <script type="text/javascript" src="{{asset('theme/vendors/jquery-3.2.1.min.js')}}"></script>
    <!--angularjs-->
    <script type="text/javascript" src="{{asset('theme/vendors/angular.min.js')}}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{asset('theme/js/materialize.min.js')}}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('theme/js/plugins.js')}}"></script>
     <!-- dropify -->
    <script type="text/javascript" src="{{asset('theme/vendors/dropify/js/dropify.min.js')}}"></script>
     <!--form-file-uploads.js - Page Specific JS codes-->
    <script type="text/javascript" src="{{asset('theme/js/scripts/form-file-uploads.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('theme/js/custom-script.js')}}"></script>
@endsection