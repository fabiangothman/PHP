<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    
    /**
     * El metodo asume que la foranea se llama "order_id" y que la id del order es "id"
     * Relación 1:1
     * Obtener la propiedad via:
     *      $invoice = Invoice::find(1);
     *      $invoice->order;
     */
    public function order(){
        /*$order = Order::find($this->order_id);
        return $order;*/

        //return $this->belongsTo('App\Models\Order', 'order_id', 'id');
        //return $this->belongsTo(Order::class, 'order_id', 'id');
        return $this->belongsTo(Order::class);
    }
}
