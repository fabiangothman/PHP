<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del profile es "id"
     * Relación 1:1
     * Obtener la propiedad via:
     *      $user = User::find(1);
     *      $user->profile;
     */
    public function profile(){
        /*$profile = Profile::where('user_id', $this->id)->first();
        return $profile;*/

        //return $this->hasOne('App\Models\Profile', 'user_id', 'id');
        //return $this->hasOne(Profile::class, 'user_id', 'id');
        return $this->hasOne(Profile::class);
    }

    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del post es "id"
     * Relación 1:m
     * Obtener la propiedad via:
     *      $user = User::find(1);
     *      $user->posts;
     *      $user->posts[0]->category;
     */
    public function posts(){
        /*$posts = Post::where('user_id', $this->id);
        return $posts;*/

        //return $this->hasMany('App\Models\Post', 'user_id', 'id');
        //return $this->hasMany(Post::class, 'user_id', 'id');
        return $this->hasMany(Post::class);
    }

    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del video es "id"
     * Relación 1:m
     * Obtener la propiedad via:
     *      $user = User::find(1);
     *      $user->posts;
     *      $user->posts[0]->category;
     */
    public function videos(){
        /*$videos = Video::where('user_id', $this->id);
        return $videos;*/

        //return $this->hasMany('App\Models\Video', 'user_id', 'id');
        //return $this->hasMany(Video::class, 'user_id', 'id');
        return $this->hasMany(Video::class);
    }

    /**
     * El metodo asume que las foranea se llaman "role_id" y "user_id" y que la en cada una es "id"
     * Relación m:m
     * Obtener la propiedad y agregar rol via:
     *      $user = User::find(1);
     *      $user->roles()->attach([1, 2]);     //Agrega items a la relacion m:m
     *      $user->roles()->sync([2, 3]);       //Remplaza items a la relacion m:m
     *      $user->roles()->detach([2]);        //Elimina items de la relacion m:m
     *      $user->roles;
     */
    public function roles(){
        //return $this->belongsToMany('App\Models\Role');
        return $this->belongsToMany(Role::class);
    }

    /**
     * Relación 1:1 polimórfica
     * Obtener la propiedad via:
     *      $user = User::find(1);
     *      $user->image;
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del comment es "id"
     * Relación 1:m
     * Obtener la propiedad via:
     *      $user = User::find(1);
     *      $user->comments;
     */
    public function comments(){
        /*$videos = Video::where('user_id', $this->id);
        return $videos;*/

        //return $this->hasMany('App\Models\Comment', 'user_id', 'id');
        //return $this->hasMany(Comment::class, 'user_id', 'id');
        return $this->hasMany(Comment::class);
    }
}
