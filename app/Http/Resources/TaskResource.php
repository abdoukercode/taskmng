<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TaskResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
        'id'=>$this->id,
        'name' => $this->name,
        'user_id' => $this->user_id,
        'avatar' => $this->avatar,
        'description' => $this->description,
        //'date' => $this->created_at->diffForHumans() */
        ];
        }
    }
