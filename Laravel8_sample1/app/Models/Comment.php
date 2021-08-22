<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];    //  Asignación masiva

    use HasFactory;

    /**
     * Relación 1:m
     * Obtener la propiedad via (Puede ser $post o $video):
     *      $post = Post::find(1);
     *      $post->comments;
     *      $post->comments()->create(['message'=>'message_from_post_1', 'user_id'=>1]);   //Crea registro desde User (automatically)
     * Crear registro alternativamente:
     *      use App\Models\Image;
     *      $image = Image::create(['message'=>'message_from_post_1', 'user_id'=>1, 'commentable_id'=>1, 'commentable_type'=>'App\Models\Post']);   //Crea registro desde Image
     */
    public function commentable(){
        return $this->morphTo();    //Relación polimórfica
    }


    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del user es "id"
     * Relación 1:m
     * Obtener la propiedad via:
     *      $comment = Comment::find(1);
     *      $comment->user;
     */
    public function user(){
        /*$user = User::find($this->user_id);
        return $user;*/

        //return $this->belongsTo('App\Models\User', 'user_id', 'id');
        //return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class);
    }
}
