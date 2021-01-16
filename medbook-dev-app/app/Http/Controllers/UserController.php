<?php
/**
 * MedBookAfrica Interview
 * 
 * @author  Nzambu Nzioki <patricknzambu@gmail.com>
 * 
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\UpdateProfileRequest;

/**
 * @group User
 *
 * Gender endpoints
 * 
 * @package Controllers
 */
class UserController extends Controller
{
    /**
     * User profile
     * 
     * Get authenticated user profile
     * 
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\Models\User
     * 
     * @return object A user profile
     */
    public function profile() {
        $user = auth()->user();
        return new UserResource($user);
    }

    /**
     * Update Profile
     * 
     * User can edit the profile data
     * 
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\Models\User
     * 
     * @return object A user profile
     */
    public function updateProfile(UpdateProfileRequest $request) {
        if($user = auth()->user()) {
            $user = User::find($user->usr_id);
            $data = $request->only($user->getFillable());
            $user->fill($data)->update();
            return new UserResource($user);
        }
    }
}
