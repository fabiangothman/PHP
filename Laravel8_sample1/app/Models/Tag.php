<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];    //  Asignación masiva
    
    use HasFactory;

    /**
     * Relación m:m polimórfica
     * Obtener la propiedad via:
     *      $tag = Tag::find(1);
     *      $tag->posts;
     */
    public function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * Relación m:m polimórfica
     * Obtener la propiedad via:
     *      $tag = Tag::find(1);
     *      $tag->videos;
     */
    public function videos(){
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
