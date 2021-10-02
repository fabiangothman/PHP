<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->unique()->randomElement(Order::pluck('id', 'id')->toArray()),
            'paid' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
