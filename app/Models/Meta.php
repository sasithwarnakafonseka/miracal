<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    /**
     * Get the user that owns the phone.
     */
    protected $table = 'meta';
    public $timestamps=false;
}