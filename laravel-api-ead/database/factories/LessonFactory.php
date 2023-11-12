<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Module;
use App\Models\Lesson;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Lesson::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->name();
        return [
            'module_id' => Module::factory(),
            'name' => $name,
            'url' => Str::slug($name),
            'video' => Str::random()
        ];
    }
}
