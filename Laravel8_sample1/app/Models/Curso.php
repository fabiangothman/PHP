<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = "cursos";
    protected $fillable = ['name', 'description', 'categoria']; //Guarda en el Modelo Curso solo estos campos
    protected $guarded = [];    //Guarda en el Modelo Curso los campos excepto estos campos

    /**
     * Se esta sobre-escribiendo este metodo de Model, para cambiar el key de busqueda por el SLUG y no por el ID
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
