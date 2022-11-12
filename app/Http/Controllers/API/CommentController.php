<?php

namespace App\Http\Controllers\API;

use App\Models\Forum;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentCollection;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate();

        return $this->sendResponse(new CommentCollection($comments), 'Properties fetched');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $validatedData = $request->validated();

        $forum = Forum::where('id', $request->forum_id);

        if (!$forum) {
            return $this->sendError('Error validation', ['Forum not found']);
        }

        $validatedData['user_id'] = Auth::user()->id;

        $image = '';

        if ($request->file('image')) {
            $image = $request->file('image')->store('storage/images', 'public');    
            $image = asset('public/' . $image);
        }

        $validatedData['image'] = $image;

        $comment = Comment::create($validatedData);

        return $this->sendResponse(new CommentResource($comment), 'Comment created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
