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
	      <h5 class="breadcrumbs-title">Envio</h5>
	      <ol class="breadcrumbs">
	        <li><a href="/">Home</a></li>	        
	        <li><a href="{{route('shipping.index')}}">Envio</a></li>
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
	    <h6 class="collection-header m-0">Envio</h6>
	    <p>{{$shipping->description}}</p>
	    <p>{{$shipping->date}}</p>
	    <p>CANTIDAD: {{$shipping->total()}}</p>

	  </li>
	  <li class="collection-item">
	    <div class="row">
	      <div class="col s7">
	        <p class="collections-title">
	          <strong>ID</strong> {{$shipping->id}}</p>
	          <strong>Descripcion</strong> {{$shipping->description}}</p>
	          <strong>Fecha</strong> {{$shipping->date}}</p>
	          <strong>Cantidad Productos</strong> {{$shipping->total()}}</p>
	      </div>
	    </div>
	  </li>
	  
	</ul>
</div>


<!-- formulario agregar producto-->
<div class="col s12 m12 l6">
    	<div class="card-panel">
    		<h4 class="header2">Nuevo</h4>
    		<div class="row">
		        <form class="col s12" action="{{route('shippingproduct.store')}}" method="POST">
		            @csrf
		            

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="quantity" name="quantity" value="{{ old('quantity',isset($shippingproduct->quantity) ? $shippingproduct->quantity : null) }}"type="text" class="validate">
  <label for="quantity">Cantidad</label>
</div>
</div>



<div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="type_shipping_id" required="required">
          <option  disabled value="" selected>Estatus</option>
        @foreach($typeshippings as $typeshipping)
          <option value="{{$typeshipping->id}}"
              @if(isset($shippingproduct->type_shipping_id))
              @if($typeshipping->id == $shippingproduct->type_shipping_id)
              selected="selected"
              @endif
              @endif>{{$typeshipping->name}}</option>
        @endforeach
      </select>
  </div>
  </div>


<div class="row">
  <div class="input-field  col s12">
    <input id="shipping_id" name="shipping_id" value="{{$shipping->id}}" type="text" hidden="hidden">
  </div>
  </div>


<div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="product_inventory_id" required="required">
          <option  disabled value="" selected>Producto Inventario</option>
        @foreach($productinventories as $productinventory)
          <option value="{{$productinventory->id}}"
              @if(isset($shippingproduct->product_inventory_id))
              @if($productinventory->id == $shippingproduct->product_inventory_id)
              selected="selected"
              @endif
              @endif>{{$productinventory->products->name}}</option>
        @endforeach
      </select>
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

<!-- FIN formulario agregar producto-->

<div class="divider"></div>
<div id="table-datatables">	
	<div class="row">
	  <div class="col s12">
	    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	      <thead>
	        <tr>
	          <th>ID</th>
	          <th>Cantidad</th>
	          <th>Producto</th>
	          <th>Tipo Envio</th>
	          <th>Opciones</th>
	        </tr>
	      </thead>
	      <tfoot>
	        <tr>
	         <th>ID</th>
	          <th>Cantidad</th>
	          <th>Producto</th>
	          <th>Tipo Envio</th>
	          <th>Opciones</th></tr>
	      </tfoot>
	      <tbody>
	      	@foreach($shipping->ShippingProducts as $shippingproducts)
	        <tr>
	          <td>{{$shippingproducts->id}}</td>
	          <td>{{$shippingproducts->quantity}}</td>
	          <td>{{$shippingproducts->productinventories->products->name}}</td>
	          <td>{{$shippingproducts->typeshippings->name}}</td>
	          <td>
	          	<div class="form-group col s12">

                    <form action="{{route('shippingproduct.destroy',$shippingproducts->id)}}" method="POST" style="display: inline">
                        {{method_field('DELETE')}}
                        @csrf
                        <a class="btn-flat" href="{{ route('shippingproduct.show',$shippingproducts->id) }}">
                            <i class="material-icons indigo-text">visibility</i>
                        </a>
                        <a class="btn-flat" href="{{ route('shippingproduct.edit',$shippingproducts->id) }}">
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