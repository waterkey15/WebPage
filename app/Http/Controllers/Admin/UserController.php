<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all()->load('roles');
//        foreach ($users as $user){
//            foreach ($user->roles as $role) {
//                return $role->name;
//            }
//        }
        return view('admin.user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        //return $request->all();

        //return $request->all();
        $success = false;
        DB::beginTransaction();
        try{
            $user = User::create([
                'name' => ($request->name),
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            if($user){
                $request->role_id;
                $role = Role::find($request->role_id);
                $saveRole = $user->assignRole($role);
                if($saveRole){
                    $success = true;
                }else{
                    $success = false;
                }
            }
        }catch (\Exception $e){
            $success = false;
            flash()->warning('Warning', 'User failed to create');

            //return 'register failed';

        }
        if($success){
            DB::commit();

            flash()->success('Success', 'User has been created');
            //return 'register successed';
        }
        return redirect()->route('admin.users.index');

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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::all();
        $user =  User::find($id)->load('roles');

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        //
        //return $request->all();
        $role = Role::find($request->role_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->assignRole($role);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //return $id;
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
