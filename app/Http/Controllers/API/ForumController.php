<?php

namespace App\Http\Controllers\API;

use App\Models\Forum;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ForumResource;
use App\Http\Resources\ForumCollection;
use App\Http\Requests\StoreForumRequest;
use App\Http\Requests\UpdateForumRequest;

class ForumController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $forums = Forum::all()->with('comments');
        $forums = Forum::all();


        return $this->sendResponse(new ForumCollection($forums), 'Forums fetched');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumRequest $request)
    {

        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::user()->id;;
        $validatedData['likes'] = 0;
        $validatedData['comments'] = 0;

        $forum = Forum::create($validatedData);

        return $this->sendResponse(new ForumResource($forum), 'Forum created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForumRequest  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumRequest $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
