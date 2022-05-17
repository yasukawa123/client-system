<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_SUPER_VISOR = 1; // スーパーバイザー
    const ROLE_EMPLOYEE = 2; // 社員
    const ROLE_PT_JOB = 3; // アルバイト

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function customers()
    {
        return $this->hasMany(CustomerLog::class);
    }

    /**
     * スーパーバイザーであればtrueを返す
     * @return bool
     */
    public function isSuperVisor(): bool
    {
        return $this['role_id'] === 1;
    }

    public static function enumSupserVisor()
    {
        return User::where('role_id', '=', 1)->get();
    }
}
