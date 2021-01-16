<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Resources\EmailResource;

class EmailController extends Controller
{
    /**
     * Email Addresses
     * 
     * Select user email addresses
     * 
     * @apiResourceCollection App\Http\Resources\EmailResource
     * @apiResourceModel App\Models\Email
     * 
     * @return object A collection of email addresses
     */
    public function index() {
        if($user = auth()->user()) {
            $numbers = Email::where('user_id', $user->usr_id)->get();
            return EmailResource::collection($numbers);
        }
    }

    /**
     * Add email address
     * 
     * Create a new user email address
     * 
     * @apiResource App\Http\Resources\EmailResource
     * @apiResourceModel App\Models\Email
     * 
     * @return object A new email address
     */
    public function store(EmailRequest $request, Email $email) {       
        $user = auth()->user();
        $request['user_id'] = $user->usr_id;
        $data = $request->only($email->getFillable());
        $email->fill($data)->save();
        return new EmailResource($email);
    }

    /**
     * Edit email address
     * 
     * Update a user email address
     * 
     * @apiResource App\Http\Resources\EmailResource
     * @apiResourceModel App\Models\Email
     * 
     * @return object A new email address
     */
    public function update(EmailRequest $request, Email $email) {
        $user = auth()->user();
        if($user->usr_id === $email->user_id) {
            $data = $request->only($email->getFillable());
            $email->fill($data)->update();
            return new EmailResource($email);
        }
    }

    /**
     * Delete email address
     * 
     * Remove a user email address
     * 
     * @apiResource App\Http\Resources\EmailResource
     * @apiResourceModel App\Models\Email
     * 
     * @return object A deleted email address
     */
    public function destroy(Email $email) {
        $email->delete();
        return new EmailResource($email);
    }
}
