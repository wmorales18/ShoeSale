<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="date" name="date" value="{{ old('date',isset($bill->date) ? $bill->date : null) }}"type="text" class="validate">
  <label for="date">Fecha</label>
</div>
</div>


<div class="row">

	<div class="input-field ">
		<select class="select2_a col s12" name="client_id" required="required">
      		<option  disabled value="" selected>Cliente</option>
  			@foreach($clients as $client)
      		<option value="{{$client->id}}"
              @if(isset($bill->client_id))
              @if($client->id == $bill->client_id)
              selected="selected"
              @endif
              @endif>{{$client->id}} {{$client->name}}</option>
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
                      
                    
         
                