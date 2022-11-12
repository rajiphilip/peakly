<?php

namespace App\Http\Controllers\API;

use App\Models\CommentShare;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreForumShareRequest;
use App\Http\Requests\UpdateForumShareRequest;

class CommentShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForumShareRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumShareRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumShare  $forumShare
     * @return \Illuminate\Http\Response
     */
    public function show(ForumShare $forumShare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumShare  $forumShare
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumShare $forumShare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForumShareRequest  $request
     * @param  \App\Models\ForumShare  $forumShare
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumShareRequest $request, ForumShare $forumShare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumShare  $forumShare
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumShare $forumShare)
    {
        //
    }
}
