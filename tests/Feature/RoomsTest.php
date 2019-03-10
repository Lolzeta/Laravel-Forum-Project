<?php

namespace Tests\Feature;


use App\Room;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomsTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function check_if_room_list_loads()
    {
        $response = $this->get('/rooms');
        $response->assertSeeText('More Info');
    }

   
    /** @test */
    public function check_if_messages_list_loads_at_room(){
        $room = Room::inRandomOrder()->first();

        $this->get('/rooms/'.$room->slug)
            ->assertSee('class="fas fa-eye"');
    }
    /** @test */
    public function check_if_room_details_page_loads(){
        $room = Room::inRandomOrder()->first();

        $this->get('/rooms/'.$room->slug)
            ->assertSee($room->name)
            ->assertSee($room->community->name)
            ->assertSee($room->votes->sum('valoration'))
            ->assertSee($room->description);
    }
    /** @test */
    public function check_if_a_guest_user_creates_a_room(){
        $this->get('/rooms/create')
            ->assertRedirect('/login');
    }
    /** @test */
    public function check_if_a_guest_user_edits_a_room(){
        $room = Room::inRandomOrder()->first();
        
        $this->get('/rooms/'.$room->id.'/edit')
            ->assertRedirect('/login');
    }

    /** @test */
    public function check_if_a_user_can_load_create_room(){
        $this->actingAs( factory('App\User')->create());

        $this->get('/rooms/create')
        ->assertOk()
        ->assertSee('Name');
    }
 
    /** @test */
    public function check_if_a_unauthorized_user_can_edit_room(){
        $this->actingAs( factory('App\User')->create());

        $room = Room::inRandomOrder()->first();

        $this->get('/rooms/'.$room->id.'/edit')
        ->assertSee('403');
    }
    /** @test */
    public function a_user_creates_a_room(){
        $this->actingAs( factory('App\User')->create() );
        $room = factory('App\Room')->create();

        $this->post('/rooms', $room->toArray() );

        $this->assertDatabaseHas('rooms', [
            'name'         => $room->name,
            'community_id'  => $room->community->id,
            'slug'          => $room->slug,
            'description'   => $room->description
        ]);
    }
    
}

