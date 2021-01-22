<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            'type' => 'phone',
            'id' => (string)$this->phn_id,
            'attributes' => [
                'phone' => $this->phone,
                'primary' => $this->primary,
                'verified' => $this->verified,
                'created' => $this->created_at,
                'difference' => $this->dateDifference($this->created_at),
            ]
        ];
    }

    /**
     * Calculate the date difference since the password was created
     * 
     * @param $date the creation date
     * 
     * @return date
     */
    public function dateDifference($date) {
        $start = Carbon::parse($date);
        $difference = $start->diff(Carbon::now());
        return $difference;
    }
}
