<?php

namespace App\Models\Accounts;

use App\Models\Traits\HasRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/***
 * Class User
 * @package App\Models\Accounts
 * @property string $name
 * @property string $email
 * @property string $password
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRole;

    protected $table = 'user';
    protected $appends = ['roles'];


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $visible = [
        'id',
        'name',
        'email',
        'password',
        'roles',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRolesAttribute()
    {
        return optional($this->roles());
    }

}
