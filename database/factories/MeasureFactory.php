<?php

namespace Database\Factories;

use App\Models\Measure;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeasureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Measure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'conversation' => $this->faker->word() . 'Conversation',
            'min_score' => rand(0, 14),
            'max_score' => rand(15, 70),
        ];
    }
}
