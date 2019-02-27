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
    {   factory(App\User::class,4)->create();
        factory(App\Community::class,4)->create();
        factory(App\Room::class,20)->create();
        factory(App\Message::class,60)->create();
        factory(App\User::class)->create([
            'name'  => 'admin',
            'role'  => 'admin',
            'email' => 'admin@testforums.com'
        ]);
    }
}
