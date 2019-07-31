@extends('layouts.master')

@section('page_styles')

<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('theme/vendors/prism/prism.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/vendors/data-tables/css/jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet">

@endsection

@section('breadcrumbs')
<div id="breadcrumbs-wrapper">           
	<div class="container">
	  <div class="row">
	    <div class="col s10 m6 l6">
	      <h5 class="breadcrumbs-title">Proveedor</h5>
	      <ol class="breadcrumbs">
	        <li><a href="/">Home</a></li>	        
	        <li><a href="{{route('supplier.index')}}">Proveedores</a></li>
	        <li class="active">Detalle</li>
	      </ol>
	    </div>
	  </div>
	</div>
@endsection

@section('content')

<div class="col s12 m12 l6">
	<h4 class="header">Detalle</h4>
	<ul id="issues-collection" class="collection z-depth-1">
	  <li class="collection-item avatar">
	    <i class="material-icons red accent-2 circle">bug_report</i>
	    <h6 class="collection-header m-0">Proveedor</h6>
	    <p>{{$supplier->name}}</p>
	    <p>{{$supplier->description}}</p>
	    <p>{{$supplier->phone}}</p>

	  </li>
	  <li class="collection-item">
	    <div class="row">
	      <div class="col s7">
	        <p class="collections-title">
	          <strong>ID</strong> {{$supplier->id}}</p>
	          <strong>Nombre</strong> {{$supplier->name}}</p>
	          <strong>Descripcion</strong> {{$supplier->description}}</p>
	          <strong>Telefono</strong> {{$supplier->phone}}</p>
	      </div>
	    </div>
	  </li>
	  
	</ul>
</div>


@endsection

@section('scripts')
<!-- jQuery Library -->
    <script type="text/javascript" src="{{asset('theme/vendors/jquery-3.2.1.min.js')}}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{asset('theme/js/materialize.min.js')}}"></script>
    <!--prism-->
    <script type="text/javascript" src="{{asset('theme/vendors/prism/prism.js')}}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="{{asset('theme/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <!--data-tables.js - Page Specific JS codes -->
    <script type="text/javascript" src="{{asset('theme/js/scripts/data-tables.js')}}"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('theme/js/plugins.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('theme/js/custom-script.js')}}"></script>
    <script type="text/javascript">
		$(document).ready(function(){
		// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});
    </script>
@endsection