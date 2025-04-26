<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Upload>
 */
class UploadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['pdf', 'image_cover']),
            'path' => $this->faker->imageUrl(), // أو تقدر تستخدم مسارات وهمية
            'uploadable_id' => null,
            'uploadable_type' => null,
        ];
    }
}
