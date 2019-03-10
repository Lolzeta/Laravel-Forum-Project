<?php

namespace Tests\Feature;

use App\Community;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommunitiesTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function check_if_communities_list_loads()
    {
        $response = $this->get('/communities');
        $response->assertSeeText('Visit community');
    }

    /** @test */
    public function check_if_community_list_loads_at_community(){
        $community = Community::inRandomOrder()->first();

        $this->get('/communities/'. $community->slug)
        ->assertSeeText('More Info');
    }

    /** @test */
    public function check_if_room_details_page_loads(){
        $community = Community::inRandomOrder()->first();

        $this->get('/communities/'.$community->slug)
            ->assertSee($community->name)
            ->assertSee($community->aka)
            ->assertSee($community->description);
    }
    /** @test */
    public function check_if_a_guest_user_creates_a_community(){
        $this->get('/communities/create')
            ->assertRedirect('/login');
    }
    /** @test */
    public function check_if_a_guest_user_edits_a_community(){
        $community = Community::inRandomOrder()->first();
        
        $this->get('/communities/'.$community->id.'/edit')
            ->assertRedirect('/login');
    }

    /** @test */
    public function check_if_a_user_can_load_create_community(){
        $this->actingAs( factory('App\User')->create());

        $this->get('/communities/create')
        ->assertOk()
        ->assertSee('Name');
    }
 
    /** @test */
    public function check_if_a_unauthorized_user_can_edit_community(){
        $this->actingAs( factory('App\User')->create());

        $community = Community::inRandomOrder()->first();

        $this->get('/communities/'.$community->id.'/edit')
        ->assertSee('403');
    }
    /** @test */
    public function a_user_creates_a_community(){
        $this->actingAs( factory('App\User')->create() );
        $community = factory('App\Community')->create();

        $this->post('/communities', $community->toArray() );

        $this->assertDatabaseHas('communities', [
            'name'         => $community->name,
            'aka'          =>  $community->aka,
            'slug'          => $community->slug,
            'description'   => $community->description
        ]);
    }
    
}