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
        $images = [
            "https://www.morgan-motor.com/wp-content/uploads/2022/02/super-3-model-1.jpg",
            "https://g2.dcdn.lt/images/pix/opel-vectra-1995-m-60574083.jpg",
            "https://media.lrytas.lt/images/2021/03/18/101803541-cd79c913-f7d1-4b98-9274-0c614a6b28c5.jpg",
            "http://www.auto-bild.lt/wp-content/uploads/2014/07/retro1.jpg",
            "https://www.kariuomene.lt/data/public/uploads/2018/11/113722_2018-11-19_vilkai_lietuvoje_lk_nuotr_1.jpg",
            "https://media.lrytas.lt/images/2020/06/21/154913262-55efe11f-162e-4c1f-b045-e200aa63977a.jpg",
            "http://www.auto-bild.lt/wp-content/uploads/2014/07/retro3.jpg"
            ];

        $title = $this->faker->text(20);
        return [
            'title' => $title,
            'content' => $this->faker->text(500),
            'image' => $images[array_rand($images)],
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
