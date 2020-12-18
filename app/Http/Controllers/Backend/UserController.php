<?php

namespace App\Http\Controllers\Backend;

use App\Components\BackendController;
use Illuminate\Http\Request;
use Libs\DataTable\DataProvider\DataProvider;
use Libs\DataTable\DataTable;
use Libs\Repositories\Interfaces\RoleRepositoryInterface;
use Libs\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends BackendController
{
    /** @var $userRepository UserRepositoryInterface */
    protected $userRepository;

    /** @var $roleRepository RoleRepositoryInterface */
    protected $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        $query = $this->userRepository->all(['select' => ['id', 'name', 'email'], 'joinWith' => ['roles']]);

        $dataProvider = new DataProvider($query, $request);

        $roles = $this->roleRepository->all(['select' => ['id', 'name']])->get();

        $config = [
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'name',
                'email',
                [
                    'label' => 'Roles',
                    'sort' => false,
                    'attribute' => 'roles',
                    'dataDropdown' => ['data' => $roles, 'mapKey' => ['id', 'name']],
                    'value' => function ($model) {
                        return 'null';
                    }
                ]
            ]
        ];

        $datatable = (new DataTable($config))->render();
        return view('backend.user.index', compact('datatable'));
    }
}
