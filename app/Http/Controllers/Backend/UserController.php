<?php

namespace App\Http\Controllers\Backend;

use App\Components\BackendController;
use Illuminate\Http\Request;
use Libs\DataTable\DataProvider\DataProvider;
use Libs\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends BackendController
{
    /** @var $userRepository UserRepositoryInterface */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $query = $this->userRepository->all(['select' => ['id', 'name'], 'joinWith' => ['roles']]);

        $dataProvider = new DataProvider($query, $request);
        return view('backend.user.index', compact('dataProvider'));
    }
}
