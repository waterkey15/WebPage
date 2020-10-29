<?php


namespace App\Helper;


use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Helper
{
    public static function setRoles(){

        $defaultSystemVars = getVar('system');
        $roles = Role::all()->pluck('name')->all();

        $role = '';
        $permission = '';
        foreach ($defaultSystemVars['default_role'] as $value){
            //return $value['name'];
            if(!in_array(slugify($value['name']), $roles)){
                if(slugify($value['name']) !== 'user'){
                    $is_show_admin = 1;
                }else{
                    $is_show_admin = 0;
                }
                $role = Role::create([

                    'name' => slugify($value['name']),
                    'description' => $value['description'],
                    'is_main' =>1,
                    'is_show_admin' =>$is_show_admin,
                    'guard_name' =>$value['guard_name']
                ]);
            }
        }
        $users = User::all()->pluck('email')->all();


        foreach ($defaultSystemVars['default_users'] as $value) {
            //return $value;
            if(!in_array($value['email'], $users)) {
                $users = User::create([
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password'=>bcrypt($value['password']),
                ]);
            }
        }

        $permissions = Permission::all()->pluck('name')->all();

        foreach ($defaultSystemVars['default_permission'] as $value) {
            //return $value;
            if(!in_array(slugify($value['name']), $permissions)) {
                $permission = Permission::create([
                    'name' => slugify($value['name']),
                    //'description' => $value['description'],
                    'is_main' =>1,
                    'guard_name' =>$value['guard_name']
                ]);
            }
        }

        $permissions = Permission::all();

        $admin_role = Role::whereName('admin')->first();
        $admin_user = User::whereEmail('admin@dingo.com')->first();
        //$editor_role = Role::whereName('editor')->first();
        $user_role = Role::whereName('user')->first();
        $web_user = User::whereEmail('user@user.com')->first();



        $admin_user->assignRole($admin_role);
        $web_user->assignRole($user_role);
        $admin_role->givePermissionTo($permissions);
    }
}
