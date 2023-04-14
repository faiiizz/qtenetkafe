<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'nama',
        'email',
        'avatar',
        'email_verified_at',
        'birth_date',
        'password',
        'password_confirmation',
        'role',
        'no_hp',
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

    public function scopeOfSelect($query)
    {
        return $query->select('user_id', 'nama', 'email', 'username', 'avatar', 'birth_date','role_id', 'created_at', 'updated_at');
    }

    public function scopeFilter($query, $filter)
    {
        foreach ($filter as $key => $value) {
            if (!empty($value)) {
                switch ($key) {
                    case 'keyword':
                        $query->where(function ($query2) use ($value) {
                            $query2->where ('nama', 'like', '%' . $value . '%')
                                ->orWhere('email', 'like', '%' . $value . '%')
                                ->orWhere('username', 'like', '%' . $value . '%')
                                ->orWhere('birth_date', 'like', '%' . $value . '%');
                        });
                        break;
                    case 'user_id':
                        if (is_array($value)) {
                            $query->whereIn('user_id', $value);
                        } else {
                            $query->where('user_id', $value);
                        }
                        break;
                }
            }
        }

        return $query;
    }

//     public function absensis()
// {
//     return $this->hasMany(Absensi::class, 'user_id', 'user_id');
// }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
