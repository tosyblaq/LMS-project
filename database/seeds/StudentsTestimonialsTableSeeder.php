<?php

use Illuminate\Database\Seeder;
use App\User;

class StudentsTestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname'=> 'mary',
            'lastname' => 'jane',
            'role' => 'student',
            'image' => 'profile/avatar.jpg',
            'email' => 'maryjane@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        $body = 'Integer sit amet mattis quam, sit amet ultricies velit. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus, omnis voluptas.';

        $user->testimonials()->create([
            'user_id' => $user->id,
            'body' => strtolower($body),
        ]);

    }
}
