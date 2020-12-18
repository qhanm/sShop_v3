<?php
namespace Libs\Repositories\Eloquent;

use App\Models\Accounts\Role;
use Libs\Repositories\Interfaces\RoleRepositoryInterface;
use Libs\Repositories\RepositoryAbstract;

class RoleRepository extends RepositoryAbstract implements RoleRepositoryInterface
{
    public function getModel()
    {
        return Role::class;
    }
}
