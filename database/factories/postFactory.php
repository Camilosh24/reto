<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = post::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),  
            'category' => Categoria::factory(),  
            'fecha' => $this->faker->date(),  
        ];
    }
}
