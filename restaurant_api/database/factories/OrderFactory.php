<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'order' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(1000, 500000),
            'created_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
