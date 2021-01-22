<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PasswordResource extends JsonResource
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
            "type" => "password",
            "id" => (string) $this->psw_id,
            'attributes' => [
                'difference' => $this->dateDifference($this->created_at),
                'created' => $this->created_at,
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
