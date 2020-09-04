<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'firstname' => 'Tosy',
            'lastname' => 'Blaq',
            'role' => 'admin',
            'email' => 'tosyblaq@gmail.com',
            'phone_number' => '08104567416',
            'password' => bcrypt('1234'),
            'image' => 'profileImage/avatar.png',
        ]);

        $profile1 = Profile::create([
            'user_id' => $user1->id,
            'address' => 'West London',
            'city' => 'London',
            'country' => 'London',
            'postal_code' => '303433',
            'about' => 'fun'
        ]);
    }
}
