<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="name" name="name" value="{{ old('name',isset($employee->name) ? $employee->name : null) }}"type="text" class="validate">
  <label for="name">Nombre</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="surname" name="surname" value="{{ old('surname',isset($employee->surname) ? $employee->surname : null) }}"type="text" class="validate">
  <label for="surname">Apellido</label>
</div>
</div>



<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="salary" name="salary" value="{{ old('salary',isset($employee->salary) ? $employee->salary : null) }}"type="text" class="validate">
  <label for="salary">Salario</label>
</div>
</div>


<div class="row">

	<div class="input-field ">
		<select class="select2_a col s12" name="branch_office_id" required="required">
      		<option  disabled value="" selected>Sucursal</option>
  			@foreach($branchoffices as $branchoffice)
      		<option value="{{$branchoffice->id}}"
              @if(isset($employee->branch_office_id))
              @if($branchoffice->id == $employee->branch_office_id)
              selected="selected"
              @endif
              @endif>{{$branchoffice->name}}</option>
  			@endforeach
  		</select>
	</div>
	</div>

  <div class="row">

  <div class="input-field ">
    <select class="select2_a col s12" name="user_id" required="required">
          <option  disabled value="" selected>Usuario</option>
        @foreach($users as $user)
          <option value="{{$user->id}}"
              @if(isset($employee->user_id))
              @if($user->id == $employee->user_id)
              selected="selected"
              @endif
              @endif>{{$user->email}}</option>
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
                      
                    
         
                