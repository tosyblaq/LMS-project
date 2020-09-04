<?php

use Illuminate\Database\Seeder;
use App\FrontEndSecondParagraph;

class FrontEndSecondParaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = 'Online Education Learn skills online.';
        $title = 'Limitless learning, more possibilities';
        $body = 'Integer pulvinar leo id viverra feugiat. Pellentesque Libero Justo, Semper At Tempus Vel, Ultrices In Sed Ligula. Nulla Uter Sollicitudin Velit. Sed porttitor orci vel fermentum elit maximus. Curabitur ut turpis massa in condimentum libero. Pellentesque maximus Pellentesque libero justo Nulla uter sollicitudin velit. Sed porttitor orci vel ferm semper at vel, ultrices in ligula semper at vel.Curabitur ut turpis massa in condimentum libero.';

        FrontEndSecondParagraph::create([
            'tag' => strtolower($tag),
            'title' => strtolower($title),
            'body' => strtolower($body),
            'image' => 'frontendImage/ab.jpg',
        ]);
    }
}
