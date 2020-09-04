<?php

use Illuminate\Database\Seeder;
use App\FrontPageHeader;

class FrontPageHeaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Any successful career starts with a good Education';

        FrontPageHeader::create([
            'title' => strtolower($title),
        ]);
    }
}
