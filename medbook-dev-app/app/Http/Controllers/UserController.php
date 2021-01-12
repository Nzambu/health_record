<?php
/**
 * MedBookAfrica Interview
 * 
 * @author  Nzambu Nzioki <patricknzambu@gmail.com>
 * 
 */

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * User profile
     * 
     * Get authenticated user profile
     * 
     * @@apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\Models\User
     * 
     * @return object A user profile
     */
    public function profile() {
        $user = auth()->user();
        return new UserResource($user);
    }
}
