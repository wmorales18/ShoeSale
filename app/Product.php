<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'description',
    	'price_cost',
    	'type_product_id',
    	'color_id',
    	'supplier_id',
    	'size_id',

      ];

   	public function typeproducts(){//////nombreHija Plural
    		return $this->belongsTo(TypeProduct::class,'type_product_id','id');
    }
    public function colors(){//////nombreHija Plural
    		return $this->belongsTo(Color::class,'color_id','id');
    }
    public function suppliers(){//////nombreHija Plural
    		return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function sizes(){//////nombreHija Plural
    		return $this->belongsTo(Size::class,'size_id','id');
    }
    public function productinventories(){
            return $this->hasMany(ProductInventory::class,'product_id','id');
    }
}
