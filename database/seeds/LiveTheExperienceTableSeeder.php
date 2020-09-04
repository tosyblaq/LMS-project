<?php

use Illuminate\Database\Seeder;
use App\LiveTheExperience;

class LiveTheExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = 'You Can Learn Anything';

        $title1 = 'Learn at your own pace';
        $body1 = 'Integer pulvinar leo id viverra feugiat. Pellentesque Libero Justo, Semper At Tempus Vel, Ultrices In Sed Ligula. Nulla Uter Sollicitudin Velit. Sed porttitor orci vel fermentum elit maximus. Curabitur ut turpis massa in condimentum libero. Pellentesque maximus Pellentesque libero justo Nulla uter sollicitudin velit. Sed porttitor orci vel ferm semper at vel, ultrices in ligula semper at vel.Curabitur ut turpis massa in condimentum libero.';


        $title2 = 'Community of opportunities';
        $body2 = 'Integer pulvinar leo id viverra feugiat. Pellentesque Libero Justo, Semper At Tempus Vel, Ultrices In Sed Ligula. Nulla Uter Sollicitudin Velit. Sed porttitor orci vel fermentum elit maximus. Curabitur ut turpis massa in condimentum libero. Pellentesque maximus Pellentesque libero justo Nulla uter sollicitudin velit. Sed porttitor orci vel ferm semper at vel, ultrices in ligula semper at vel.Curabitur ut turpis massa in condimentum libero.';


        $title3 = 'Official certificate';
        $body3 = 'Integer pulvinar leo id viverra feugiat. Pellentesque Libero Justo, Semper At Tempus Vel, Ultrices In Sed Ligula. Nulla Uter Sollicitudin Velit. Sed porttitor orci vel fermentum elit maximus. Curabitur ut turpis massa in condimentum libero. Pellentesque maximus Pellentesque libero justo Nulla uter sollicitudin velit. Sed porttitor orci vel ferm semper at vel, ultrices in ligula semper at vel.Curabitur ut turpis massa in condimentum libero.';

        $first = LiveTheExperience::create([
            'tag' => strtolower($tag),
            'title' => strtolower($title1),
            'body' => strtolower($body1),
            'image' => 'frontendImage/n1.jpg',
        ]);

        $second = LiveTheExperience::create([
            'tag' => strtolower($tag),
            'title' => strtolower($title2),
            'body' => strtolower($body2),
            'image' => 'frontendImage/n2.jpg',
        ]);

        $third = LiveTheExperience::create([
            'tag' => strtolower($tag),
            'title' => strtolower($title3),
            'body' => strtolower($body3),
            'image' => 'frontendImage/n3.jpg',
        ]);
    }
}
