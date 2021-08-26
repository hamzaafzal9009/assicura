<?php

namespace App\Models;

use App\Models\Follow;
use App\Models\UserProfile;
use App\Models\UserRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function rantings()
    {
        return $this->hasMany(UserRating::class, 'user_id', 'id');
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, Follow::class, 'follower_id', 'user_id', 'user_id', 'id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, Follow::class, 'followed_id', 'user_id', 'user_id', 'id');
    }

    // Agent Relation with agency
    public function agency()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    // Agency Relation with agent

    public function agents()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

}
