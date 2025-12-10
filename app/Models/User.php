<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const int ROLE_ADMIN = 0;
    public const int ROLE_READER = 1;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getRoles()
    {
        return [
            self::ROLE_READER => 'Читатель',
            self::ROLE_ADMIN => 'Администратор',
        ];
    }

    public function getAvatarAttribute()
    {
        if ($this->attributes['avatar'] != null) {
            return Storage::url($this->attributes['avatar']);
        }
        return asset('images/user.jpg');
    }
}
