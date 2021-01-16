<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "type" => "user",
            "id" => (string) $this->usr_id,
            "attributes" => [
                "firstName" => $this->first_name,
                "lastName" => $this->last_name,
                "name" => $this->first_name." ".$this->last_name,
                "email" => $this->email
            ],
            'relationships' => [
                'email' => [
                    EmailResource::collection($this->emails)
                ],
                'phone' => [
                    PhoneResource::collection($this->phone)
                ]
            ],
            "links" => [
                "self" => $request->fullUrl()
            ]
        ];
    }
}
