<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="total" name="total" value="{{ old('total',isset($detailpay->total) ? $detailpay->total : null) }}"type="text" class="validate">
  <label for="name">Total</label>
</div>
</div>



<div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="type_pay_id" required="required">
          <option  disabled value="" selected>Tipo Activo</option>
        @foreach($typepays as $typepay)
          <option value="{{$typepay->id}}"
              @if(isset($detailpay->type_pay_id))
              @if($typepay->id == $detailpay->type_pay_id)
              selected="selected"
              @endif
              @endif>{{$typepay->name}}</option>
        @endforeach
      </select>
  </div>
  </div>


<div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="bill_id" required="required">
          <option  disabled value="" selected>Tipo Activo</option>
        @foreach($bills as $bill)
          <option value="{{$bill->id}}"
              @if(isset($detailpay->bill_id))
              @if($bill->id == $detailpay->bill_id)
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
                      
                    
         
                