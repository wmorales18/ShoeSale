<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="name" name="name" value="{{ old('name',isset($product->name) ? $product->name : null) }}"type="text" class="validate">
  <label for="name">Nombre</label>
</div>
</div>


<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="description" name="description" value="{{ old('description',isset($product->description) ? $product->description : null) }}"type="text" class="validate">
  <label for="description">Descripcion</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="price_cost" name="price_cost" value="{{ old('price_cost',isset($product->price_cost) ? $product->price_cost : null) }}"type="text" class="validate">
  <label for="price_cost">Costo Producto</label>
</div>
</div>


<div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="type_product_id" required="required">
          <option  disabled value="" selected>Tipo Producto</option>
        @foreach($typeproducts as $typeproduct)
          <option value="{{$typeproduct->id}}"
              @if(isset($product->type_product_id))
              @if($typeproduct->id == $product->type_product_id)
              selected="selected"
              @endif
              @endif>{{$typeproduct->name}}</option>
        @endforeach
      </select>
  </div>
  </div>

  <div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="color_id" required="required">
          <option  disabled value="" selected>Color</option>
        @foreach($colors as $color)
          <option value="{{$color->id}}"
              @if(isset($product->color_id))
              @if($color->id == $product->color_id)
              selected="selected"
              @endif
              @endif>{{$color->name}}</option>
        @endforeach
      </select>
  </div>
  </div>

  <div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="supplier_id" required="required">
          <option  disabled value="" selected>Proveedor</option>
        @foreach($suppliers as $supplier)
          <option value="{{$supplier->id}}"
              @if(isset($product->supplier_id))
              @if($supplier->id == $product->supplier_id)
              selected="selected"
              @endif
              @endif>{{$supplier->name}}</option>
        @endforeach
      </select>
  </div>
  </div>

  <div class="row">
  <div class="input-field ">
    <select class="select2_a col s12" name="size_id" required="required">
          <option  disabled value="" selected>Tamaño</option>
        @foreach($sizes as $size)
          <option value="{{$size->id}}"
              @if(isset($product->size_id))
              @if($size->id == $product->size_id)
              selected="selected"
              @endif
              @endif>{{$size->name}}</option>
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
                      
                    
         
                