@extends('layouts.master')

@section('page_styles')
<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('theme/vendors/prism/prism.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/vendors/data-tables/css/jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/vendors/flag-icon/css/flag-icon.min.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<div id="breadcrumbs-wrapper">           
	<div class="container">
	  <div class="row">
	    <div class="col s10 m6 l6">
	      <h5 class="breadcrumbs-title">Colores</h5>
	      <ol class="breadcrumbs">
	        <li><a href="/">Home</a></li>	        
	        <li class="active">Colores</li>
	      </ol>
	    </div>
	  </div>
	</div>
</div>
@endsection

@section('content')
<h4 class="header">Listado</h4>
<div class="divider"></div>
<div id="table-datatables">	
	<div class="row">
	  <div class="col s12">
	    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	      <thead>
	        <tr>
	          <th>ID</th>
	          <th>Nombre</th>
	          <th>Opciones</th>
	        </tr>
	      </thead>
	      <tfoot>
	        <tr>
	         <th>ID</th>
	         <th>Nombre</th>
	         <th>Opciones</th>
	        </tr>
	      </tfoot>
	      <tbody>
	      	@foreach($colors as $color)
	        <tr>
	          <td>{{$color->id}}</td>
	          <td>{{$color->name}}</td>
	           <td>
	          	<div class="form-group col s12">

                    <form action="{{route('color.destroy',$color->id)}}" method="POST" style="display: inline">
                        {{method_field('DELETE')}}
                        @csrf
                        <a class="btn-flat" href="{{ route('color.show',$color->id) }}">
                            <i class="material-icons indigo-text">visibility</i>
                        </a>
                        <a class="btn-flat" href="{{ route('color.edit',$color->id) }}">
                            <i class="material-icons green-text">mode_edit</i>
                        </a>
                        <button type="submit" class="btn-flat"> <i class="material-icons red-text">delete_forever</i></button>
                    </form>

                </div>
	          </td>
	        </tr>
	        @endforeach        
	      </tbody>
	    </table>
	  </div>
	</div>
</div>

@endsection

@section('floatingactionbutton')
<div class="fixed-action-btn " style="bottom: 50px; right: 19px;">
  <a class="btn-floating btn-large">
    <i class="material-icons">view_module</i>
  </a>
  <ul>
    <li>
      <a href="{{route('color.create')}}" class="btn-floating blue">
        <i class="material-icons">fiber_new</i>
      </a>
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
@endsection