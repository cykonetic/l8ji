<?php

namespace Database\Factories;

use App\Models\Journal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JournalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Journal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(rand(3, 6), true),
            'description' => $this->faker->paragraph(rand(3, 5)),
            'url' => $this->faker->url,
        ];
    }
}
