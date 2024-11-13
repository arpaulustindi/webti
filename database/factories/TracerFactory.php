<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Periode;
use App\Models\Tracer;

class TracerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tracer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'periode_id' => Periode::factory(),
            'nama' => $this->faker->word(),
            'tahun_masuk' => $this->faker->numberBetween(-10000, 10000),
            'tahun_lulus' => $this->faker->numberBetween(-10000, 10000),
            'nim' => $this->faker->word(),
            'waktu_tunggu' => $this->faker->word(),
            'kantor' => $this->faker->word(),
            'lingkup' => $this->faker->word(),
            'bidang' => $this->faker->word(),
            'penetrasi' => $this->faker->word(),
            'hp' => $this->faker->word(),
            'domisili' => $this->faker->word(),
        ];
    }
}
