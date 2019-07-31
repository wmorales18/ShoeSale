@extends('layouts.master')

@section('page_styles')

@endsection

@section('breadcrumbs')
<div id="breadcrumbs-wrapper">           
	<div class="container">
	  <div class="row">
	    <div class="col s10 m6 l6">
	      <h5 class="breadcrumbs-title">Proveedor</h5>
	      <ol class="breadcrumbs">
	        <li><a href="/">Home</a></li>	        
	        <li><a href="{{route('supplier.index')}}">Proveedor</a></li>
	        <li class="active">Editar</li>x|
	      </ol>
	    </div>
	  </div>
	</div>
@endsection

@section('content')

    <div class="col s12 m12 l6">
    	<div class="card-panel">
    		<h4 class="header2">Cambiar</h4>
    		<div class="row">
		        <form class="col s12" action="{{route('supplier.update',$supplier->id)}}" method="POST">
		        	{{method_field('PATCH')}}
		            @csrf
		            @include('supplier.form')
		        </form>

		    </div>
    	</div>
    </div>

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