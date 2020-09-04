<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'role' => 'admin'
        ]);

        $role2 = Role::create([
            'role' => 'teacher'
        ]);

        $role3 = Role::create([
            'role' => 'student'
        ]);
    }
}
