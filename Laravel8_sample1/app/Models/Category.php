<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * El metodo asume que la foranea se llama "category_id" y que la id del user es "id"
     * Relación 1:m
     * Obtener la propiedad via:
     *      $category = Category::find(1);
     *      $category->posts;
     */
    public function posts(){
        /*$posts = Post::where('category_id', $this->id);
        return $posts;*/

        //return $this->hasMany('App\Models\Post', 'category_id', 'id');
        //return $this->hasMany(Post::class, 'category_id', 'id');
        return $this->hasMany(Post::class);
    }
}
