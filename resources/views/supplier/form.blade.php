
<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="name" name="name" value="{{ old('name',isset($supplier->name) ? $supplier->name : null) }}"type="text" class="validate">
  <label for="name">Nombre</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="description" name="description" value="{{ old('description',isset($supplier->description) ? $supplier->description : null) }}"type="text" class="validate">
  <label for="description">Descripcion</label>
</div>
</div>


<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="phone" name="phone" value="{{ old('phone',isset($supplier->phone) ? $supplier->phone : null) }}"type="text" class="validate">
  <label for="phone">Telefono</label>
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
                      
                    
         
                