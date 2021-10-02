<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = ['name', 'order']; //Guarda en el Modelo Order solo estos campos
    protected $guarded = [];    //Guarda en el Modelo Order los campos excepto estos campos
    

    /**
     * El metodo asume que la foranea se llama "order_id" y que la id del invoice es "id"
     * Relación 1:1
     * Obtener la propiedad via:
     *      $order = Order::find(1);
     *      $order->invoice;
     */
    public function invoice(){
        /*$invoice = Invoice::where('order_id', $this->id)->first();
        return $invoice;*/

        //return $this->hasOne('App\Models\Invoice', 'order_id', 'id');
        //return $this->hasOne(Invoice::class, 'order_id', 'id');
        return $this->hasOne(Invoice::class);
    }
}
