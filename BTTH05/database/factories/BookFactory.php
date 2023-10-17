<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idAuthors = DB::table('authors')->pluck('id')->toArray();
        return [
            //
            'author_id' => $this->faker->randomElement($idAuthors),
            'title' => $this->faker->paragraph(),

        ];
    }
}
