<?php

namespace Database\Factories;

use App\Models\Chennel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChennelFactory extends Factory
{

    protected $model = Chennel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
