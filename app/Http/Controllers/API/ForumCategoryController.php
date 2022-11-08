<?php

namespace App\Http\Controllers\API;

use App\Models\ForumCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ForumCategoryResource;
use App\Http\Resources\ForumCategoryCollection;
use App\Http\Requests\StoreForumCateroryRequest;
use App\Http\Requests\UpdateForumCateroryRequest;

class ForumCategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ForumCategory::all();

        return $this->sendResponse(new ForumCategoryCollection($categories), 'Categories fetched');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForumCateroryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumCateroryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::user()->id;

        $category = ForumCategory::create($validatedData);

        return $this->sendResponse(new ForumCategoryResource($category), 'Property created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumCaterory  $forumCaterory
     * @return \Illuminate\Http\Response
     */
    public function show(ForumCategory $forumCaterory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumCaterory  $forumCaterory
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumCategory $forumCaterory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForumCateroryRequest  $request
     * @param  \App\Models\ForumCaterory  $forumCaterory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumCateroryRequest $request, ForumCategory $forumCaterory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumCaterory  $forumCaterory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumCategory $forumCaterory)
    {
        //
    }
}
