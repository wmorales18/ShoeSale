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
	      <h5 class="breadcrumbs-title">Sucursal</h5>
	      <ol class="breadcrumbs">
	        <li><a href="/">Home</a></li>	        
	        <li><a href="{{route('branchoffice.index')}}">Sucursal</a></li>
	        <li class="active">Detalle</li>
	      </ol>
	    </div>
	  </div>
	</div>
@endsection

@section('content')
<br>
<br>
<div class="col s12 m12 l6">
	<h4 class="header">Detalle</h4>
	<ul id="issues-collection" class="collection z-depth-1">
	  <li class="collection-item avatar">
	    <i class="material-icons red accent-2 circle">bug_report</i>
	    <h6 class="collection-header m-0">Sucursal</h6>
	    <p>{{$branchoffice->name}}</p>
	    <p>{{$branchoffice->phone}}</p>
	    <p>{{$branchoffice->address}}</p>
	    <strong>Total costo Activos</strong> {{$branchoffice->totalactivo()}}</p>
	    <strong>Total costo Nomina</strong> {{$branchoffice->totalnomina()}}</p>

	  </li>
	  <li class="collection-item">
	    <div class="row">
	      <div class="col s7">
	        <p class="collections-title">
	          <strong>ID</strong> {{$branchoffice->id}}</p>
	          <strong>Nombre</strong> {{$branchoffice->name}}</p>
	          <strong>Telefono</strong> {{$branchoffice->phone}}</p>
	          <strong>Direccion</strong> {{$branchoffice->address}}</p>
	      </div>
	    </div>
	  </li>
	  
	</ul>
</div>




<!-- formulario productos sucursales -->

<div class="divider"></div>
<strong><th>PRODUCTOS SUCURSAL</th></strong>
<div id="table-datatables">	
	<div class="row">
	  <div class="col s12">
	    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	      <thead>
	        <tr>
	          <th>ID</th>
	          <th>Precio Venta</th>
	          <th>Cantidad</th>
	          <th>Producto</th>
			  <th>Sucursal</th>
	          <th>Opciones</th>
	        </tr>
	      </thead>
	   
	      <tbody>
	      	@foreach($branchoffice->productinventories as $productinventory)
	        <tr>
	          <td>{{$productinventory->id}}</td>
	          <td>{{$productinventory->sale_price}}</td>
	          <td>{{$productinventory->quantity}}</td>
	          <td>{{$productinventory->products->name}}</td>
	         <td>{{$productinventory->branchoffices->name}}</td>
	          <td>
	          	<div class="form-group col s12">

                    <form action="{{route('productinventory.destroy',$productinventory->id)}}" method="POST" style="display: inline">
                        {{method_field('DELETE')}}
                        @csrf
                        <a class="btn-flat" href="{{ route('productinventory.show',$productinventory->id) }}">
                            <i class="material-icons indigo-text">visibility</i>
                        </a>
                        <a class="btn-flat" href="{{ route('productinventory.edit',$productinventory->id) }}">
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



<!-- FIN formulario productos sucursales -->


<!-- FIN formulario activos -->

<div class="divider"></div>
<strong><th>ACTIVOS SUCURSAL</th></strong>
<div id="table-datatables">	
	<div class="row">
	  <div class="col s12">
	    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	      <thead>
	        <tr>
	          <th>ID</th>
	          <th>Nombre</th>
	          <th>Descripcion</th>
	          <th>Valor</th>
	          <th>Tipo Activo</th>
	          <th>Sucursal</th>
	          <th>Opciones</th>
	        </tr>
	      </thead>
	      
	      <tbody>
	      	@foreach($branchoffice->actives as $active)
	        <tr>
	          <td>{{$active->id}}</td>
	          <td>{{$active->name}}</td>
	          <td>{{$active->descrition}}</td>
	          <td>{{$active->value}}</td>
	          <td>{{$active->typeactives->name}}</td>
	          <td>{{$active->branchoffices->name}}</td>
	          <td>
	          	<div class="form-group col s12">

                    <form action="{{route('active.destroy',$active->id)}}" method="POST" style="display: inline">
                        {{method_field('DELETE')}}
                        @csrf
                        <a class="btn-flat" href="{{ route('active.show',$active->id) }}">
                            <i class="material-icons indigo-text">visibility</i>
                        </a>
                        <a class="btn-flat" href="{{ route('active.edit',$active->id) }}">
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


<!-- FIN formulario activos -->


<!-- FORMULARIO EMPLEADOS-->

<div class="divider"></div>
<strong><th>EMPLEADOS SUCURSAL</th></strong>

<div id="table-datatables">	
	<div class="row">
	  <div class="col s12">
	    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	      <thead>
	        <tr>
	        <th>ID</th>
	          <th>Nombre</th>
	          <th>Apellido</th>
	          <th>Salario</th>
	          <th>Sucursal</th>
	          <th>Usuario</th>
	          <th>Opciones</th>
	        </tr>
	      </thead>
	      
	      <tbody>
	      	@foreach($branchoffice->employees as $employee)
	        <tr>
	          <td>{{$employee->id}}</td>
	          <td>{{$employee->name}}</td>
	          <td>{{$employee->surname}}</td>
	          <td>{{$employee->salary}}</td>
	          <td>{{$employee->branchoffices->name}}</td>
	          <td>{{$employee->users->email}}</td>
	          <td>
	          	<div class="form-group col s12">

                    <form action="{{route('employee.destroy',$employee->id)}}" method="POST" style="display: inline">
                        {{method_field('DELETE')}}
                        @csrf
                        <a class="btn-flat" href="{{ route('employee.show',$employee->id) }}">
                            <i class="material-icons indigo-text">visibility</i>
                        </a>
                        <a class="btn-flat" href="{{ route('employee.edit',$employee->id) }}">
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

</div>
<!-- FIN FORMULARIO EMPLEADOS-->


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