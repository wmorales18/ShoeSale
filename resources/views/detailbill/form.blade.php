<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="quantity" name="quantity" value="{{ old('quantity',isset($detailbill->quantity) ? $detailbill->quantity : null) }}"type="text" class="validate">
  <label for="quantity">Cantidad</label>
</div>
</div>


<div class="row">

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

  <div class="input-field ">
    <select class="select2_a col s12" name="bill_id" required="required">
          <option  disabled value="" selected>Factura</option>
        @foreach($bills as $bill)
          <option value="{{$bill->id}}"
              @if(isset($detailbill->bill_id))
              @if($bill->id == $detailbill->bill_id)
              selected="selected"
              @endif
              @endif>{{$bill->id}}</option>
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
                      
                    
         
                