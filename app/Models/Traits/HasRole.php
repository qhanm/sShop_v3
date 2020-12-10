<?php
namespace App\Models\Traits;

use App\Models\Accounts\Role;
use App\Models\Accounts\RoleUser;
use Illuminate\Support\Collection;

trait HasRole
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param int $role_id
     * @return bool
     * @throws \ErrorException
     */
    public function assignRole(int $role_id)
    {
        if(empty($this->id)) throw new \ErrorException('The model user is empty value');

        $role = Role::query()->where('id', $role_id)->first();

        if($role === null) throw new \ErrorException(sprintf('Can not found id: %d in role model', $role_id));

        $dataRoleUser = [
            'user_id' => $this->id,
            'role_id' => $role_id,
        ];

        return RoleUser::query()->firstOrCreate($dataRoleUser, $dataRoleUser) ? true : false;
    }

    /**
     * @param int $role_id
     * @return bool
     * @throws \ErrorException
     */
    public function revokeRole(int $role_id)
    {
        if(empty($this->id)) throw new \ErrorException('The model user is empty value');

        return RoleUser::query()->where('user_id', $this->id)->where('role_id', $role_id)->delete() ? true : false;
    }

    /**
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role)
    {
        try{
            $hasRole = $this->roles()->first()->name === $role;
        }catch (\Exception $exception){
            $hasRole = false;
        }
        return $hasRole;
    }

    /**
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission)
    {
        return $this->getPermission()->contains($permission);
    }

    /**
     * @return Collection
     */
    public function getPermission()
    {
        $roles = $this->roles()->get();

        $permissionCollect = collect();

        foreach ($roles as $role){
            $permissionCollect = $permissionCollect->merge($role->permissions->pluck('name')->flatten());
        }
        return $permissionCollect;
    }
}
