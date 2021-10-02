<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order_id)
    {
        $order = Order::find($order_id);
        if($order)
            return $this->orderResponseSuccess($order);
        else
            return $this->orderResponseFail("Can't find the id $order_id", 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $order = Order::create($request->all());
            return $this->orderResponseSuccess($order);
        } catch (\Exception $e) {
            return $this->orderResponseFail($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if($order){
            $order->name = $request->name;
            $order->order = $request->order;
            $order->price = $request->price;
        }else{
            return $this->orderResponseFail("Can't find the id $id", 404);
        }
        
        try {
            $order->update();
            return $this->orderResponseSuccess($order);
        } catch (\Exception $e) {
            return $this->orderResponseFail($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if($order){
            try{
                $order->delete();
                return $this->orderResponseSuccess($order);
            } catch (\Exception $e) {
                return $this->orderResponseFail($e->getMessage(), 500);
            }
        }else{
            return $this->orderResponseFail("Can't find the id $id", 404);
        }
    }

    private function orderResponseSuccess(Order $order){
        return response(json_encode([
            'id' => $order->id,
            'name' => $order->name,
            'order' => $order->order,
            'price' => $order->price,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
            'factura' => $order->invoice
        ]), 200)->header('Content-Type', 'application/json');
    }

    private function orderResponseFail(string $message, int $error_code){
        return response(json_encode([
            'error' => $message
        ]), $error_code)->header('Content-Type', 'application/json');
    }
}
