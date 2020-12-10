<?php

namespace App\Models\Accounts;

use App\Components\Model;

/**
 * Class PermissionRole
 * @package App\Models\Accounts
 * @property int $role_id
 * @property int $permission_id
 */
class PermissionRole extends Model
{
    protected $table = 'permission_role';

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'permission_id'
    ];
}
