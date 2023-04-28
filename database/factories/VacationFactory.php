<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacationFactory extends Factory
{
    protected $model = Vacation::class;

    public function definition(): array
    {
        $start_date = Carbon::now()->addDays($this->faker->numberBetween(1, 30));
        $end_date = Carbon::now()->addDays($this->faker->numberBetween(31, 60));
        $approved = $this->faker->boolean();

        return [
            'user_id' => User::factory(),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'approved' => $approved,
            'created_at' => $this->faker->dateTimeBetween('-2 years', ),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', )
        ];
    }
}
