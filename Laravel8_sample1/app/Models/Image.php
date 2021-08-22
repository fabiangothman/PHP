<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];    //  Asignación masiva

    use HasFactory;

    /**
     * Relación 1:1
     * Obtener la propiedad via (Puede ser $post o $user):
     *      $user = User::find(1);
     *      $user->image;
     *      $user->image()->create(['url'=>'url_2']);   //Crea registro desde User (automatically)
     * Crear registro alternativamente:
     *      use App\Models\Image;
     *      $image = Image::create(['url'=>'url1', 'imageable_id'=>1, 'imageable_type'=>'App\Models\User']);   //Crea registro desde Image
     */
    public function imageable(){
        return $this->morphTo();    //Relación polimórfica
    }
}
