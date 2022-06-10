<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'cover_event_url'=>$this->cover_event_url==''?'':config('app.url').'/storage/'.$this->cover_event_url,
            'started_at_date'=>$this->started_at_date,
            'description'=>$this->description,
            'finished_at_date'=>$this->finished_at_date,
            'started_at_time'=>$this->started_at_time->format('h:m'),
            'finished_at_time'=>$this->finished_at_time->format('h:m'),
            'status'=>$this->status,
            'likes_count'=>$this->likes_count,
            'likes'=>$this->likes,
            'comments_count'=>$this->comments_count,
            'country'=>$this->church->country==null?"":$this->church->country->name,
            'province'=>$this->church->province==null?"":$this->church->province->name,
            'ctity'=>$this->church->ctity==null?"":$this->church->ctity->name,
            'isSelfLike'=>$this->isSelfLike($this->id),
            'church'=>$this->church,
        ];
    }
}
