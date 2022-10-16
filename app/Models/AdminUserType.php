<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserType extends Model
{
    /**
     * Get the user that owns the phone.
     */
    protected $table = 'admin_user_type';
    public $timestamps=false;
}