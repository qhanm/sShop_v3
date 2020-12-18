<?php
namespace Libs\Repositories\Eloquent;

use App\Models\Accounts\User;
use Libs\Repositories\Interfaces\UserRepositoryInterface;
use Libs\Repositories\RepositoryAbstract;

class UserRepository extends RepositoryAbstract implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
}
