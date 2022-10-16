<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


     public function productBrands()
    {
        return $this->hasMany(ProductBrands::class,'product_id');
    }

    public function productCategory()
    {
        return $this->hasMany(ProductCategory::class,'product_id');
    }

     public function productsTag()
    {
        return $this->hasMany(ProductTag::class,'product_id');
    }
     public function productsImage()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }
    
    //  public function productsAttributes()
    // {
    //     return $this->hasMany(ProductsAttributes::class);
    // }

}
