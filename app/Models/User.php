<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function threads()
    {
        return $this->hasMany(ThreadTable::class);
    }

    public function likes()
    {
        return $this->hasMany(LikeTable::class);
    }

    public function toko(){
        return $this->hasOne(TokoModel::class, 'user_id' );
    }

    public function wishlist(){
        return $this->hasMany(WishlistTable::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderTable::class, 'user_id');
    }
}
