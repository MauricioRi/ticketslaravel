<?php

namespace Database\Factories;

use App\Models\routes;
use Illuminate\Database\Eloquent\Factories\Factory;

class routesfactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = routes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idroutes '=>null,
             'Name_route'=>$this->faker->sentence(),
              'description'=>$this->faker->paragraph(),

        ];
        //'categoria'=>$this->faker->randomElement("desarrollo web","diseño web");
    }
}
