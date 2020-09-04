<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'web development',
            'slug' => str_slug('web development'),
            'image' => 'categoryImage/g1.jpg',
            'description' => 'learn to code website, build apps, algorithms, etc with core tools like javascript, python, php, c#, c++...',
            'price' => '70'
        ]);

        $category2 = Category::create([
            'name' => 'graphics',
            'slug' => str_slug('graphics'),
            'image' => 'categoryImage/g2.jpg',
            'description' => 'learn to design logos, photoshop and others using tools like Indesign, Adobe Photoshop...',
            'price' => '100'
        ]);

        $category3 = Category::create([
            'name' => 'cyber technology',
            'slug' => str_slug('cyber technology'),
            'image' => 'categoryImage/g3.jpg',
            'description' => 'learn skills to protect your businness from hackers...',
            'price' => '100'
        ]);
    }
}
