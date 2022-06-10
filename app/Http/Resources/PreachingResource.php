<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PreachingResource extends JsonResource
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
            'predicator_name'=>$this->predicator_name,
            'cover_image_url'=>config('app.url').'/storage/'.$this->cover_image_url,
            'audio_file_url'=>config('app.url').'/storage/'.$this->audio_file_url,
            'status'=>$this->getSize(),
            'audio_size'=>$this->status,
        ];
    }
}
