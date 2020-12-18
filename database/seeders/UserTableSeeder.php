<?php

namespace Database\Seeders;

use App\Models\Accounts\Permission;
use App\Models\Accounts\PermissionRole;
use App\Models\Accounts\Role;
use App\Models\Accounts\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'qhnam.67@gmail.com';
        $user->name = 'Quach Hoai Nam';
        $user->password = Hash::make('123456');
        $user->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'superadmin';
        $roleAdmin->guard_name = 'web';
        $roleAdmin->save();


        $roleE = new Role();
        $roleE->name = 'employee';
        $roleE->guard_name = 'web';
        $roleE->save();

        $roleW = new Role();
        $roleW->name = 'witter';
        $roleW->guard_name = 'web';
        $roleW->save();

        $roleS = new Role();
        $roleS->name = 'shipper';
        $roleS->guard_name = 'web';
        $roleS->save();

        $user->assignRole($roleAdmin->id);

        $faker = Factory::create();

        for($i = 0; $i < 199; $i++){
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->unique()->email;
            $user->password = Hash::make('123456');
            $user->save();
        }

        $listPermission = [
            ['name' => 'get.user', 'guard_name' => 'web'],
            ['name' => 'post.user', 'guard_name' => 'web'],
            ['name' => 'put.user', 'guard_name' => 'web'],
            ['name' => 'delete.user', 'guard_name' => 'web'],
        ];


        foreach ($listPermission as $key => $permission){
            $permissionModel = new Permission();
            $permissionModel->fill($permission);
            $permissionModel->save();

            $modelPermissionRole = new PermissionRole();
            $modelPermissionRole->role_id = $roleAdmin->id;
            $modelPermissionRole->permission_id = $permissionModel->id;
            $modelPermissionRole->save();
        }
    }
}
