<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="name" name="name" value="{{ old('name',isset($active->name) ? $active->name : null) }}"type="text" class="validate">
  <label for="name">Nombre</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="descrition" name="descrition" value="{{ old('descrition',isset($active->descrition) ? $active->descrition : null) }}"type="text" class="validate">
  <label for="descrition">Descripcion</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="value" name="value" value="{{ old('value',isset($active->value) ? $active->value : null) }}"type="text" class="validate">
  <label for="value">Valor</label>
</div>
</div>


<div class="row">

  <div class="input-field ">
    <select class="select2_a col s12" name="type_active_id" required="required">
          <option  disabled value="" selected>Tipo Activo</option>
        @foreach($typeactives as $typeactive)
          <option value="{{$typeactive->id}}"
              @if(isset($active->type_active_id))
              @if($typeactives->id == $active->type_active_id)
              selected="selected"
              @endif
              @endif>{{$typeactive->name}}</option>
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
              @if(isset($active->branch_office_id))
              @if($branchoffice->id == $active->branch_office_id)
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
                      
                    
         
                