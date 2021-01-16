<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
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
            "type" => "email",
            "id" => (string)$this->eml_id,
            "attributes" => [
                "email" => $this->email,
                "primary" => $this->primary,
                "verified" => $this->verified
            ]
        ];
    }
}
