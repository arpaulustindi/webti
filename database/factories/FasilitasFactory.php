<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Fasilitas;

class FasilitasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fasilitas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fasilitas' => $this->faker->word(),
            'kategori' => $this->faker->word(),
            'foto' => $this->faker->word(),
            'deskripsi' => $this->faker->word(),
        ];
    }
}
