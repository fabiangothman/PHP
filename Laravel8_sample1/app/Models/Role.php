<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * El metodo asume que la foranea se llama "user_id" y que la id del role_user es "id"
     * Relación m:m
     * Obtener la propiedad via:
     *      $role = Rol::find(1);
     *      $role->users;
     */
    public function users(){
        //return $this->belongsToMany('App\Models\User');
        return $this->belongsToMany(User::class);
    }

    /**
     * El metodo asume que las foranea se llaman "permission_id" y "role_id" y que la en cada una es "id"
     * Relación m:m
     * Obtener la propiedad y agregar rol via:
     *      $role = Role::find(1);
     *      $role->permissions()->attach([1, 2]);     //Agrega items a la relacion m:m
     *      $role->permissions()->sync([2, 3]);       //Remplaza items a la relacion m:m
     *      $role->permissions()->detach([2]);        //Elimina items de la relacion m:m
     *      $role->permissions;
     */
    public function permissions(){
        //return $this->belongsToMany('App\Models\Permission');
        return $this->belongsToMany(Permission::class);
    }
}
