<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use App\Models\ForumLike;
use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreForumLikeRequest;
use App\Http\Requests\UpdateForumLikeRequest;
use App\Http\Requests\StoreCommentLikeRequest;

class CommentLikeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeOrUnlike($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return $this->sendError('Comment not found', ['Comment not found']);
        }

        $like = $comment->likes()->where('user_id', Auth::user()->id)->first();

        // if not loved before
        if (!$like) {
            CommentLike::create([
                'user_id' => Auth::user()->id,
                'comment_id' => $id,
            ]);

            return $this->sendResponse([], 'Liked');
        }

        //else dislike it
        $like->delete();
        return $this->sendResponse([], 'Disliked');
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
     * @param  \App\Http\Requests\StoreForumLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumLike  $forumLike
     * @return \Illuminate\Http\Response
     */
    public function show(ForumLike $forumLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumLike  $forumLike
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumLike $forumLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForumLikeRequest  $request
     * @param  \App\Models\ForumLike  $forumLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumLikeRequest $request, ForumLike $forumLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumLike  $forumLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumLike $forumLike)
    {
        //
    }
}
