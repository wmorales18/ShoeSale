@extends('layouts.master')

@section('page_styles')

@endsection

@section('breadcrumbs')
<div id="breadcrumbs-wrapper">           
	<div class="container">
	  <div class="row">
	    <div class="col s10 m6 l6">
	      <h5 class="breadcrumbs-title">Factura</h5>
	      <ol class="breadcrumbs">
	        <li><a href="/">Home</a></li>	        
	        <li><a href="{{route('bill.index')}}">Factura</a></li>
	        <li class="active">Crear</li>
	      </ol>
	    </div>
	  </div>
	</div>
@endsection

@section('content')

    <div class="col s12 m12 l6">
    	<div class="card-panel">
    		<h4 class="header2">Nuevo Factura</h4>
    		<div class="row">
		        <form class="col s12" action="{{route('bill.store')}}" method="POST">
		            @csrf
		            @include('bill.form')
		        </form>

		    </div>
    	</div>
    </div>


<!-- CREAR CLIENTE-->

 <div class="col s12 m12 l6">
        <div class="card-panel">
            <h4 class="header2">Nuevo Cliente</h4>
            <div class="row">
                <form class="col s12" action="{{route('client.store')}}" method="POST">
                    @csrf
                    <div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="name" name="name" value="{{ old('name',isset($client->name) ? $client->name : null) }}"type="text" class="validate">
  <label for="name">Nombre</label>
</div>
</div>


<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="surname" name="surname" value="{{ old('surname',isset($client->surname) ? $client->surname : null) }}"type="text" class="validate">
  <label for="surname">Apellido</label>
</div>
</div>


<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="phone" name="phone" value="{{ old('phone',isset($client->phone) ? $client->phone : null) }}"type="text" class="validate">
  <label for="phone">Telefono</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="address" name="address" value="{{ old('address',isset($client->address) ? $client->address : null) }}"type="text" class="validate">
  <label for="address">Direccion</label>
</div>
</div>



<div class="row">
<div class="row">
  <div class="input-field col s12">
    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
  </div>
</div>
</div>
                </form>

            </div>
        </div>
    </div>


<!-- FIN CREAR CLIENTE-->





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