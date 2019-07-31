
<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="name" name="name" value="{{ old('name',isset($client->name) ? $client->name : null) }}"type="text" class="validate">
  <label for="name">Nombre</label>
</div>
</div>


<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="surname" name="surname" value="{{ old('surname',isset($client->surname) ? $client->surname : null) }}"type="text" class="validate">
  <label for="surname">Apellido</label>
</div>
</div>


<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="phone" name="phone" value="{{ old('phone',isset($client->phone) ? $client->phone : null) }}"type="text" class="validate">
  <label for="phone">Telefono</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="address" name="address" value="{{ old('address',isset($client->address) ? $client->address : null) }}"type="text" class="validate">
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
                      
                    
         
                