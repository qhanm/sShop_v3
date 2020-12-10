<?php
namespace App\Models\Accounts;

use App\Components\Model;
use App\Models\Traits\HasPermission;

/**
 * Class Role
 * @package App\Models\Accounts
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $guard_name
 */
class Role extends Model
{
    use HasPermission;

    protected $table = 'role';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'guard_name',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
