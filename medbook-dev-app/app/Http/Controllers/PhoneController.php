<?php
/**
 * MedBookAfrica Interview
 * 
 * @author  Nzambu Nzioki <patricknzambu@gmail.com>
 * 
 */

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Http\Requests\SwitchPrimaryPhoneRequest;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Resources\PhoneResource;

/**
 * @group  User Phone Number
 *
 * Gender endpoints
 * 
 * @package Controllers
 */
class PhoneController extends Controller
{
    /**
     * Phone Number/s
     * 
     * Select user phone numbers
     * 
     * @apiResourceCollection App\Http\Resources\PhoneResource
     * @apiResourceModel App\Models\Phone
     * 
     * @return object A collection of phone numbers
     */
    public function index() {
        if($user = auth()->user()) {
            $numbers = Phone::where('user_id', $user->usr_id)->get();
            return PhoneResource::collection($numbers);
        }
    }

    /**
     * Add phone number
     * 
     * Create a new user phone number
     * 
     * @apiResource App\Http\Resources\PhoneResource
     * @apiResourceModel App\Models\Phone
     * 
     * @return object A new phone number
     */
    public function store(PhoneRequest $request, Phone $phone) {
        $user = auth()->user();
        $request['user_id'] = $user->usr_id;
        $data = $request->only($phone->getFillable());
        $phone->fill($data)->save();
        return new PhoneResource($phone);
    }
    
    /**
     * Edit phone number
     * 
     * Update a user phone number
     * 
     * @apiResource App\Http\Resources\PhoneResource
     * @apiResourceModel App\Models\Phone
     * 
     * @return object A new phone number
     */
    public function update(PhoneRequest $request, Phone $phone) {
        return $request;
        $user = auth()->user();
        if($user->usr_id === $phone->user_id) {
            $data = $request->only($phone->getFillable());
            $phone->fill($data)->update();
            return new PhoneResource($phone);
        }
    }

    /**
     * Delete phone number
     * 
     * Remove a user phone number
     * 
     * @apiResource App\Http\Resources\PhoneResource
     * @apiResourceModel App\Models\Phone
     * 
     * @return object A deleted phone number
     */
    public function destroy(Phone $phone) {
        $phone->delete();
        return new PhoneResource($phone);
    }

    /**
     * Change primary phone number
     * 
     * Switch the numbers to make the other number a primary. The current primary phone number will be set to false.
     * 
     * @apiResourceCollection App\Http\Resources\PhoneResource
     * @apiResourceModel App\Models\Phone
     */
    public function switchPrimaryPhone(SwitchPrimaryPhoneRequest $request) {
        $phone = Phone::where('phone', $request->phone)->first();
        $userID = $phone->user_id;
        Phone::where('user_id', $userID)->update(['primary' => false]);
        Phone::where('phone', $request->phone)->update(['primary' => true]);
        return $this->index();

    }
}
