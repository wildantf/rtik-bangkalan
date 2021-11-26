<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Position;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    
    protected $guarded = ['id'];
    protected $with=['position'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function setPasswordAttribute($password){
    //     $this->attributes['password']=bcrypt($password);
    // }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Merubah route key name yang sebelumnya  
    public function getRouteKeyName(){
        return 'username';
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
}
