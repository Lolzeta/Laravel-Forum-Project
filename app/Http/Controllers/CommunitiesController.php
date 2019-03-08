<?php

namespace App\Http\Controllers;

use App\Community;
use Illuminate\Http\Request;
use App\Http\Requests\CommunityRequest;

class CommunitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
        
        $this->middleware('can:manipulate,community', [
             'only'  =>  ['edit', 'update','destroy']
        ]);
        
    }

    public function index()
    {
        $communities = Community::paginate(10);
        return view('public.communities.index', [
            'communities' => $communities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.communities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunityRequest $request)
    {
        $community = Community::create([
            'name'        =>    request('name'),
            'user_id'     =>    $request->user()->id,
            'slug'        =>    str_slug(request('name'),'-'),
            'description' =>    request('description')
          ]);
          return redirect('/communities/'.$community->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $community = Community::where('slug',$slug)->firstOrFail();
        $rooms = $community->rooms()->paginate(10);
        return view('public.communities.show',[
            'community' => $community,
            'rooms' =>  $rooms
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        return view('public.communities.edit', [
            'community' => $community
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(CommunityRequest $request, Community $community)
    {
        $community->update([
            'name'        =>    request('name'),
            'slug'        =>    str_slug(request('name'),'-'),
            'description' =>    request('description')
        ]);
        return redirect('/communities/'.$community->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $community->delete();
        return redirect('/communities/');
    }
}
