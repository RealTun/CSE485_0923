<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\AuthorFactory;
use Database\Factories\BookFactory;
use App\Models\Author;
use App\models\Book;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Author::factory()->count(5)->create()->each(function($author){
            $author->book()->createMany(Book::factory()->count(3)->make()->toArray());
        });
    }
}
