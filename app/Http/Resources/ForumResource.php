<?php

namespace App\Http\Resources;

use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ForumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [
        //     "id" => $this->id,
        //     "user_id" => $this->user_id,
        //     "forum_category_id" => $this->forum_category_id,
        //     "title" => $this->title,
        //     "description"  => $this->description,
        //     "likes"  => $this->likes,
        //     "comments"  => $this->comments,
        //     "created_at" => $this->created_at,
        //     "updated_at" => $this->updated_at,
        //     "comments" => CommentResource::collection($this->whenLoaded('comments'))
        // ];
    }
}
