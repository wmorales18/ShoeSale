<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
   protected $fillable = [
    	'id',
    	'sale_price',
    	'quantity',
    	'product_id',
    	'branch_office_id'

      ];

   	public function products(){//////nombreHija Plural
    		return $this->belongsTo(Product::class,'product_id','id');
    }
    public function branchoffices(){//////nombreHija Plural
    		return $this->belongsTo(BranchOffice::class,'branch_office_id','id');
    }
    public function detailbills(){
            return $this->hasMany(ProductInventory::class,'product_inventory_id','id');
    }

}
