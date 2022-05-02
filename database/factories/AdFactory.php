<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $model_id = $this->faker->numberBetween(1, 14);
        $manufacturer = Model::where('id', $model_id)->first()->manufacturer_id;

        $title = $this->faker->text(20);
        return [
            'title' => $title,
            'content' => $this->faker->text(500),
            'image' => "https://www.morgan-motor.com/wp-content/uploads/2022/02/super-3-model-1.jpg",
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'user_id' => $this->faker->numberBetween(1, 12),
            'slug' => Str::slug($title),
            'views' => $this->faker->numberBetween(1, 500),
            'category_id' => 1,
            'active' => 1,
            'model_id' => $model_id,
            'manufacturer_id' => $manufacturer,
            'type_id' => $this->faker->numberBetween(1, 7),
            'color_id' => $this->faker->numberBetween(1, 12),
            'year' => $this->faker->numberBetween(1980, 2022),
            'vin' => strtoupper($this->faker->regexify('[A-Za-z0-9]{17}'))

        ];
    }
}
