<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'type' => 'patient',
            'id' => (string) $this->ptn_id,
            'attributes' => [
                'name' => $this->name,
                'dob' => $this->dob,
                'comments' => $this->comments
            ],
            'relationships' => [
                'gender' => [
                    new GenderResource($this->gender)
                ],
                'service' => [
                    new ServiceResource($this->service)
                ]
            ]
        ];
    }
}
