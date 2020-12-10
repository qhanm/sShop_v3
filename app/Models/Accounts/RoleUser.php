<?php

namespace App\Models\Accounts;

use App\Components\Model;

class RoleUser extends Model
{

    protected $table = 'role_user';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'role_id'
    ];
}
