<?php

use Illuminate\Database\Seeder;
use App\GetStarted;

class GetStartedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Get started with Online Education !';
        $body = 'Sed ut perspiciatis unde omnis natus error dolor volup tatem ed accus antium dolor emque laudantium, totam rem aperiam, eaqu ipsa quae ab illo quasi architi ecto beatae vitae dicta sunt dolor ipsum.';

        $first = GetStarted::create([
            'title' => strtolower($title),
            'body' => strtolower($body),
        ]);

    }
}
