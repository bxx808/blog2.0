<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingUser\SettingUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function general()
    {
        return view('settings.general');
    }

    public function safety()
    {
        return view('settings.safety');
    }

    public function updateGeneral(SettingUserRequest $request)
    {
        $data = $request->validated();
        $user = User::find(Auth::user()->id);
        if($user){
            if($data['avatar'] != null){
                $path = $request->file('avatar')->store('avatars', 'public');
                if($user->avatar){
                    Storage::disk('public')->delete($user->avatar);
                }
                $user->avatar = $path;
            }
            $user->name = $data['name'];
            $user->first_name = $data['firstName'];
            $user->about = $data['about'];
            $user->save();
            return back()->with('success', 'Профиль обновлен!');
        }
    }
}
