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
          <option  disabled value="" selected>Tipo Envio</option>
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
  <div class="input-field ">
    <select class="select2_a col s12" name="shipping_id" required="required">
          <option  disabled value="" selected>Envio</option>
        @foreach($shippings as $shipping)
          <option value="{{$shipping->id}}"
              @if(isset($shippingproduct->shipping_id))
              @if($shipping->id == $shippingproduct->shipping_id)
              selected="selected"
              @endif
              @endif>{{$shipping->id}}</option>
        @endforeach
      </select>
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
              @endif>{{$productinventory->id}}</option>
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
                      
                    
         
                