<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate($this->getPaginate()), 'roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\User $model
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $model)
    {
        $role = Role::findById($request->get('role'))->name;

        $password = $role == $model::ROLE_CLIENT ? Str::random(8) : $request->get('password');

        /** @var User $user */
        $user = $model->create($request->merge(['password' => Hash::make($password)])->all());

        $user->assignRole($role);

        return redirect()->route('users.index')->withStatus(__("User '{$request->get('email')}' successfully created."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Routing\Redirector
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->assignRole(Role::findById($data['role'])->name);
        $user->update($data);

        return redirect(route('users.index'))->with('status', __("User '{$request->get('email')}' successfully updated."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('users.index')->withStatus(__('User successfully deleted.'));
    }
}
