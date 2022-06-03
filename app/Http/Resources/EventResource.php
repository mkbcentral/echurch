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
            'title'=>$this->title,
            'cover_event_url'=>config('app.url').'/storage/'.$this->cover_event_url,
            'started_at_date'=>$this->started_at_date,
            'finished_at_date'=>$this->finished_at_date,
            'started_at_time'=>$this->started_at_time,
            'finished_at_time'=>$this->finished_at_time,
            'status'=>$this->status,
            'church'=>$this->church,
        ];
    }
}
