<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use App\Http\Requests\TokenRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Errors\ErrorResource;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\ProfileChangePasswordRequest;
use App\Http\Resources\Auth\ChangePasswordResource;

class ResetPasswordController extends Controller
{
    /**
     * Verify Token
     * 
     * Verify the reset password token
     */
    public function verifyResetPasswordToken(TokenRequest $request) 
    {
        return $request;
    }

    /**
     * Change password
     * 
     * Select a new user password
     */
    public function changePassword(TokenRequest $tokenRequest, ChangePasswordRequest $request, Password $password) 
    {
        $resetData = ResetPassword::where('token', $tokenRequest->token)->first();
        $request['password'] = Hash::make($request->password);
        $request['user_id'] = $resetData->user_id;
        $newPasswordData = $request->only($password->getFillable());
        $password->fill($newPasswordData)->save();
        return new ChangePasswordResource($password);
    }

    /**
     * Account change password 
     * 
     * @return mixed
     */
    public function profileChangePassword(ProfileChangePasswordRequest $profile, ChangePasswordRequest $request, Password $password) 
    {
        // return true;
        $user = auth()->user();

        $passwordData = Password::where('user_id', $user->usr_id)->orderBy('psw_id', 'DESC')->first();
        $passwordHash = $passwordData->password;

        if(Hash::check($request->previous_password, $passwordHash)) {
            
            /**
             * Change the password
             */
            $request['user_id'] = $user->usr_id;
            $request['password'] = Hash::make($request->password);
            $data = $request->only($password->getFillable());
            $password->fill($data)->save();
            return new ChangePasswordResource($password);
        }
        
        /**
         * Wrong previous password error message
         */
        $request["code"] = "ATH002";
        $request["status"] =  401;
        $request["title"] = "The previous password is incorrect";
        $request["detail"] = "Please provide the correct previous password";
        return (new ErrorResource($request))
            ->response()
            ->setStatusCode(200);
    }
}
