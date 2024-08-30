<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // generate data melalui kelas factory
        // Category::factory(3)->create();

        Category::create([
            'category_name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'red'
        ]);
        
        Category::create([
            'category_name' => 'Data Structure',
            'slug' => 'data-structure',
            'color' => 'green'
        ]);

        Category::create([
            'category_name' => 'Web Programming',
            'slug' => 'web-programming',
            'color' => 'blue'
        ]);

        Category::create([
            'category_name' => 'UI UX',
            'slug' => 'ui-ux',
            'color' => 'yellow'
        ]);
    }
}
