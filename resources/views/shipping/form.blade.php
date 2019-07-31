
<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="description" name="description" value="{{ old('description',isset($shipping->description) ? $shipping->description : null) }}"type="text" class="validate">
  <label for="description">Descripcion</label>
</div>
</div>

<div class="row">
  <label for="date">Fecha</label>
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="date" name="date" value="{{ old('date',isset($shipping->date) ? $shipping->date : null) }}" type="datetime" class="validate">
  
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="total_product" name="total_product" value="{{ old('total_product',isset($shipping->total_product) ? $shipping->total_product : null) }}"type="text" class="validate">
  <label for="total_product">Total</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="branch_office_id" name="branch_office_id" value="{{ old('branch_office_id',isset($shipping->total_product) ? $shipping->total_product : null) }}"type="text" class="validate">
  <label for="total_product">Sucursal Destino</label>
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
                      
                    
         
                