<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(JumbotronTableSeeder::class);
        $this->call(FrontPageHeaderTableSeeder::class);
        $this->call(FrontEndSecondParaTableSeeder::class);
        $this->call(LiveTheExperienceTableSeeder::class);
        $this->call(GetStartedTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(StudentsTestimonialsTableSeeder::class);
        $this->call(CompanyDetailsTableSeeder::class);
    }
}
