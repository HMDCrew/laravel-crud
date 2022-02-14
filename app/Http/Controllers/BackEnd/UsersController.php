<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with('roles')->get();

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('backend.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $new_user = $request->validated();
        $new_user['password'] = Hash::make($request->password);
        $user = User::create($new_user);

        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return $this->edit($user);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');
        $user->load('roles');

        return view('backend.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $new_user = $request->validated();

        if($request->password) {
            $new_user['password'] = Hash::make($request->password);
        }

        $user->update($new_user);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('users.index');
    }
}
