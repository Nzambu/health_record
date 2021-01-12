<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "type" => 'gender',
            'id' => (string)$this->gnd_id,
            'attributes' => [
                'sex' => $this->sex
            ]
        ];
    }
}
