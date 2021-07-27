<?php

namespace Database\Factories;

use App\Models\Commet;
use App\Models\Postblogs;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'post_id'=>Postblogs::factory(),
            'user_id'=>User::factory(),
            'body'=>$this->faker->paragraph()
        ];
    }
}
