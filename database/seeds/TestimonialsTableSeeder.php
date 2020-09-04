<?php

use Illuminate\Database\Seeder;
use App\Testimonial;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $header = 'See what people are saying';

        Testimonial::create([
            'header' => strtolower($header),
        ]);
    }
}
