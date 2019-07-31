<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="sale_price" name="sale_price" value="{{ old('sale_price',isset($productinventory->sale_price) ? $productinventory->sale_price : null) }}"type="text" class="validate">
  <label for="sale_price">Precio Venta</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="quantity" name="quantity" value="{{ old('quantity',isset($productinventory->quantity) ? $productinventory->quantity : null) }}"type="text" class="validate">
  <label for="quantity">Cantidad</label>
</div>
</div>



<div class="row">

  <div class="input-field ">
    <select class="select2_a col s12" name="product_id" required="required">
          <option  disabled value="" selected>Producto</option>
        @foreach($products as $product)
          <option value="{{$product->id}}"
              @if(isset($productinventory->product_id))
              @if($product->id == $productinventory->product_id)
              selected="selected"
              @endif
              @endif>{{$product->name}}</option>
        @endforeach
      </select>
  </div>
  </div>


<div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="branch_office_id" required="required">
          <option  disabled value="" selected>Sucursal</option>
        @foreach($branchoffices as $branchoffice)
          <option value="{{$branchoffice->id}}"
              @if(isset($productinventory->branch_office_id))
              @if($branchoffice->id == $productinventory->branch_office_id)
              selected="selected"
              @endif
              @endif>{{$branchoffice->name}}</option>
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
                      
                    
         
                