<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RolesTableSeeder::class);

        $users = factory(App\User::class, 5)
           ->create()
           ->each(function ($user) {
                $user->role()->attach(App\Role::inRandomOrder()->first());
            });
    }
}
