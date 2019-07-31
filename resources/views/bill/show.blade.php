@extends('layouts.master')

@section('page_styles')

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
	      <h5 class="breadcrumbs-title">Factura</h5>
	      <ol class="breadcrumbs">
	        <li><a href="/">Home</a></li>	        
	        <li><a href="{{route('bill.index')}}">Factura</a></li>
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
	    <h6 class="collection-header m-0">Factura</h6>
	    <p>{{$bill->id}}</p>
	  </li>
	  <li class="collection-item">
	    <div class="row">
	      <div class="col s7">
	        <p class="collections-title">
	          <strong>ID</strong> {{$bill->id}}</p>
	          <strong>Fecha</strong> {{$bill->date}}</p>
	          <strong>Total</strong> {{$bill->total()}}</p>
	          <strong>Cliente</strong> {{$bill->clients->name}}</p>
	          <strong>Empleado</strong> {{$bill->users->name}}</p>

	      </div>
	    </div>
	  </li>
	  
	</ul>
</div>

<!-- FORMULARIO AGREGAR PRODUCTO -->

<div class="col s12 m12 l6">
    	<div class="card-panel">
    		<h4 class="header2">Nuevo</h4>
    		<div class="row">
		         <form class="col s12" action="{{route('detailbill.store')}}" method="POST">
   @csrf
<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="quantity" name="quantity" value="{{ old('quantity',isset($detailbill->quantity) ? $detailbill->quantity : null) }}"type="text" class="validate">
  <label for="quantity">Cantidad</label>
</div>
</div>


  <div class="input-field ">
    <select class="select2_a col s12" name="product_inventory_id" required="required">
          <option  disabled value="" selected>Producto Inventario</option>
        @foreach($productinventories as $productinventory)
          <option value="{{$productinventory->id}}"
              @if(isset($detailbill->product_inventory_id))
              @if($productinventory->id == $detailbill->product_inventory_id)
              selected="selected"
              @endif
              @endif>{{$productinventory->id}}</option>
        @endforeach
      </select>
  </div>
  </div>

<div class="row">
  <div class="input-field  col s12">
    <input id="bill_id" name="bill_id" value="{{$bill->id}}" type="text" hidden="hidden">
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

<!-- FIN CREAR PRODUCTO-->






<!-- formulario detalle factura-->

<div class="divider"></div>
<div id="table-datatables">	
	<div class="row">
	  <div class="col s12">
	    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	      
	        <tr>
	          <th>ID</th>
	            <th>Factura</th>
	            <th>Producto Inventario</th>
	         	 <th>Cantidad</th>
	         	 <th>Precio</th>
	          	 <th>Subtotal</th>
	           <th>Opciones</th>
	        </tr>
	  
	      <tfoot>
	        <tr>
	          <th>ID</th>
	            <th>Factura</th>
	            <th>Producto Inventario</th>
	         	 <th>Cantidad</th>
	         	 <th>Precio</th>
	          	 <th>Subtotal</th>
	           <th>Opciones</th>
	        </tr>
	      </tfoot>
	      <tbody>
	      	@foreach($bill->detailbills as $detailbill)
	        <tr>
	          <td>{{$detailbill->id}}</td>
	          <td>{{$detailbill->bills->id}}</td>
	          <td>{{$detailbill->productinventories->products->name}}</td>
	          <td>{{$detailbill->quantity}}</td>
	          <td>{{$detailbill->productinventories->sale_price}}</td>
	          <td>{{$detailbill->subtotal}}</td>
	          
	          
	          <td>
	          	<div class="form-group col s12">

                    <form action="{{route('detailbill.destroy',$detailbill->id)}}" method="POST" style="display: inline">
                        {{method_field('DELETE')}}
                        @csrf
                        <a class="btn-flat" href="{{ route('detailbill.show',$detailbill->id) }}">
                            <i class="material-icons indigo-text">visibility</i>
                        </a>
                        <a class="btn-flat" href="{{ route('detailbill.edit',$detailbill->id) }}">
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

<!-- FIN formulario detalle factura -->



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