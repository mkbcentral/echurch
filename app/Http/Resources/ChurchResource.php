<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChurchResource extends JsonResource
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
            'name'=>$this->name,
            'abreviation'=>$this->abreviation,
            'pastor_name'=>$this->pastor_name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'logo_url'=>config('app.url').'/storage/'. $this->logo_url,
            'status'=>$this->status,
            'country'=>$this->country==null?"":$this->country->name,
            'province'=>$this->province==null?"":$this->province->name,
            'ctity'=>$this->ctity==null?"":$this->ctity->name,
        ];
    }
}
