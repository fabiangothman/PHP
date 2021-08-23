<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del user es "id"
     * Relación 1:1
     * Obtener la propiedad via:
     *      $video = Video::find(1);
     *      $video->user;
     */
    public function user(){
        /*$user = User::find($this->user_id);
        return $user;*/

        //return $this->belongsTo('App\Models\User', 'user_id', 'id');
        //return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class);
    }


    /**
     * Relación 1:m polimórfica
     * Obtener la propiedad via:
     *      $video = Video::find(1);
     *      $video->comments;
     *      $video->comments()->create(['message'=>'message_from_video_1', 'user_id'=>1]);   //Crea registro desde Video (automatically)
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }


    /**
     * Relación m:m polimórfica
     * Obtener la propiedad via:
     *      $video = Video::find(1);
     *      $video->tags;
     *      $video->tags()->create(['name'=>'new_tag_from_video']);   //Crea nuevo Tag y Taggeable asociado desde Video (automatically)
     */
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
