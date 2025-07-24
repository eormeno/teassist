<?php

namespace Database\Factories;

use App\Utils\ImageUtils;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    public function definition()
    {
        $images = ImageUtils::downloadImage(256, 256);

        if (!is_array($images) || !isset($images['original'], $images['thumbnail'])) {
            $images = [
                'original' => 'default.jpg',
                'thumbnail' => 'default_thumb.jpg',
            ];
        }

        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(),
            'image' => $images['original'],
            'thumbnail' => $images['thumbnail'],
        ];
    }
}
