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
    {   factory(App\User::class,20)->create();
        factory(App\Community::class,10)->create();
        $rooms = factory(App\Room::class,40)->create();
        $messages = factory(App\Message::class,200)->create();
        $votes = factory(App\Vote::class,100)->create();
        factory(App\User::class)->create([
            'name'  => 'admin',
            'role'  => 'admin',
            'email' => 'admin@testforums.com'
        ]);

        $rooms->each(function(App\Room $room) use ($votes){
            $room->votes()->attach(
                $votes->random(random_int(0,100))
            );
        });
        
        $messages->each(function(App\Message $message) use ($votes){
            $message->votes()->attach(
                $votes->random(random_int(0,100))
            );
        });
    }
}
