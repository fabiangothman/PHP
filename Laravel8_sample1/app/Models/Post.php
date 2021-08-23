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
     *      $user = User::find(1);
     *      $user->image;
     *      $user->image()->create(['url'=>'url_2']);   //Crea registro desde User (automatically)
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }


    /**
     * Relación 1:m polimórfica
     * Obtener la propiedad via:
     *      $post = Post::find(1);
     *      $post->comments;
     *      $post->comments()->create(['message'=>'message_from_post_1', 'user_id'=>1]);   //Crea registro desde Post (automatically)
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Relación m:m polimórfica
     * Obtener la propiedad via:
     *      $post = Post::find(1);
     *      $post->tags;
     *      $post->tags()->create(['name'=>'new_tag_from_post']);   //Crea nuevo Tag y Taggeable desde Post (automatically)
     */
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
