<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del user es "id"
     * Relación 1:m
     * Obtener la propiedad via:
     *      $post = Post::find(1);
     *      $post->user;
     */
    public function user(){
        /*$user = User::find($this->user_id);
        return $user;*/

        //return $this->belongsTo('App\Models\User', 'user_id', 'id');
        //return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class);
    }

    /**
     * El metodo asume que la foranea se llama "category_id" y que la id del user es "id"
     * Relación 1:m
     * Obtener la propiedad via:
     *      $post = Post::find(1);
     *      $post->category;
     */
    public function category(){
        /*$category = Category::find($this->category_id);
        return $category;*/

        //return $this->belongsTo('App\Models\Category', 'category_id', 'id');
        //return $this->belongsTo(Category::class, 'category_id', 'id');
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación 1:1 polimórfica
     * Obtener la propiedad via:
     *      $profile = Profile::find(1);
     *      $profile->user;
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
