
<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="name" name="name" value="{{ old('name',isset($branchoffice->name) ? $branchoffice->name : null) }}"type="text" class="validate">
  <label for="name">Nombre</label>
</div>
</div>



<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="phone" name="phone" value="{{ old('phone',isset($branchoffice->phone) ? $branchoffice->phone : null) }}"type="text" class="validate">
  <label for="phone">Telefono</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="address" name="address" value="{{ old('address',isset($branchoffice->address) ? $branchoffice->address : null) }}"type="text" class="validate">
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
                      
                    
         
                