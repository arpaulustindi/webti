<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Matkul;

class MatkulFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matkul::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'semseter' => $this->faker->numberBetween(-10000, 10000),
            'kode' => $this->faker->word(),
            'matkul' => $this->faker->word(),
            'jenis' => $this->faker->word(),
            'gambar' => $this->faker->word(),
            'modul' => $this->faker->word(),
            'rps' => $this->faker->word(),
            'pendukung' => $this->faker->word(),
            'deskripsi' => $this->faker->word(),
        ];
    }
}
