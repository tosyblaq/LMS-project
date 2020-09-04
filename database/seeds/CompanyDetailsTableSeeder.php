<?php

use Illuminate\Database\Seeder;

use App\CompanyDetail;

class CompanyDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyName = 'Cyber Solutions';
        $companyAddress = 'Honey Online Educations, 9th Block,Uk';
        $companyEmail = 'greyhatcybersolutions@gmail.com';
        $companyPhone = '0803348983';

        CompanyDetail::create([
            'name' => $companyName,
            'address' => $companyAddress,
            'email' => $companyEmail,
            'phone_number' => $companyPhone,
        ]);

    }
}
