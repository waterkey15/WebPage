<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.role.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        //return $request->name;
        DB::beginTransaction();
        $success = '';
        try{
            $name = $request->name;
            $data = Role::whereName(slugify($name))->first();
            if(!$data){
                $role = Role::create([
                    'name' =>slugify($name),
                    'guard_name' => 'web',
                    'is_show_admin' => $request->is_show_admin
                ]);
                if($role){
                    $success = true;
                }else{
                    $success = false;
                }
            }else{
                flash()->warning('Failed to execute', 'Role was already registered');
                //flash()->success('Success', 'Role has been saved');

            }
        }catch (\Exception $e){
            $success = false;
            flash()->success('Failed to execute', 'Role can not be added');

        }
        if($success){
            DB::commit();
            flash()->success('Success', 'Role has been saved');
        }else{
            //return 'failed adding role';
            flash()->warning('Failed to execute', 'Role was already registered');
        }


        //flash()->success('Success to execute', 'Role has been saved');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
                $role = Role::find($id);
                $role->name = slugify($request->name);
                $role->is_show_admin = $request->is_show_admin;
                $role->save();



                return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $perm = Role::find($id);
        if($perm->is_main !== 1){
            $perm->delete();
        }
        return redirect()->back();
    }

    public function managePermissions($id)
    {
        $role = Role::find($id)->load('permissions');
//        foreach ($role->permissions as $permission){
//            return $permission;
//        }
        $permissions = Permission::all();
        return view('admin.role.common.manage-permission', compact('permissions', 'role'));
    }

    public function managePermissionsStore(Request $request)
    {
        //return $request->all();
        $role = Role::find($request->id);
        $permissions = Permission::all();
        foreach ($permissions as $permission){
            $permission->removeRole($role);
        }
        $requestedPermissions = $request->permissions;
        if($requestedPermissions){
            foreach ($requestedPermissions as $key => $requestedPermission) {
                //return $key;
                $dbPerm = Permission::find($key);
                $role -> givePermissionTo($dbPerm);
            }
        }
        return redirect()->back();
    }
}
