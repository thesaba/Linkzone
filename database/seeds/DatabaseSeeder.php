<?php

use Linkzone\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,100) as $index) {
            User::create([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'username' => '@' . $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ]);
        }
    }
}
