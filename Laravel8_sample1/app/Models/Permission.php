<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    /**
     * El metodo asume que la foranea se llama "role_id" y que la id del permission_role es "id"
     * Relación m:m
     * Obtener la propiedad via:
     *      $permission = Permission::find(1);
     *      $permission->roles;
     */
    public function roles(){
        //return $this->belongsToMany('App\Models\Role');
        return $this->belongsToMany(Role::class);
    }
}
