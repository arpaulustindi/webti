<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Periode;

class PeriodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Periode::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'periode' => $this->faker->date(),
            'keterangan' => $this->faker->word(),
            'aktif' => $this->faker->boolean(),
        ];
    }
}
