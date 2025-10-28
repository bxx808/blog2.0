<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
                'users' => User::all(),
            ]
        );
    }

    public function create()
    {
        return view('admin.user.store', [
            'roles' => User::getRoles(),
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate($data);
        return redirect()->route('admin.user.index')->with('success', 'Пользователь успешно добавлен!');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
            'roles' => User::getRoles(),
        ]);

    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        session()->flash('success', 'Пользователь успешно обновлен!');
        return redirect()->route('admin.user.index');

    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Пользователь успешно удален!');
    }
}
