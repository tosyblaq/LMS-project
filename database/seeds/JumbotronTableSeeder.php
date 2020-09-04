<?php

use Illuminate\Database\Seeder;
use App\Jumbotron;
class JumbotronTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Best Online Learning Center';
        $body = 'Maecenas quis neque libero. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget pulvinar neque pharetra ac.Pellentesque convallis diam consequat magna vulputate malesuada.';

        Jumbotron::create([
            'title' => strtolower($title),
            'body' => $body,
        ]);
    }
}
