<?php
namespace App\Models\Accounts;

use App\Components\Model;

/**
 * Class Permission
 * @package App\Models\Accounts
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $guard_name
 */
class Permission extends Model
{
    protected $table = 'permission';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'guard_name',
    ];

}
