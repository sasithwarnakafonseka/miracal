<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Sale extends Model
{
    use HasFactory;

    public function salebill()
    {
        return $this->hasMany('App\Models\SaleBill','sale_id');
    }

    public function saleproduct()
    {
        return $this->hasMany('App\Models\SaleProduct','sale_id');
    }

}
