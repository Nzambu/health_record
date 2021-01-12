<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class JWTResource extends JsonResource
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
            "type" => "authorization",
            "id" => "token",
            "attributes" => [
                "access_token" => $this->access_token,
                "token_type" => $this->token_type,
                "expires_in" => $this->expires_in,
            ],
            "links" => [
                "self" => $request->fullUrl()
            ]
        ];
    }
}
