<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'novel', 'comic', 'mystery', 'romance', 'thriller', 'comedy', 'fantasy'
        ];

        foreach ($data as $value) {
            Category::insert([
                'name' => $value,
                'slug' => $value
            ]);
        }
    }
}
