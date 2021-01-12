<?php
/**
 * MedBookAfrica Interview
 * 
 * @author  Nzambu Nzioki <patricknzambu@gmail.com>
 * 
 */

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Http\Resources\GenderResource;

/**
 * @group Gender
 *
 * Gender endpoints
 * 
 * @package Controllers
 */
class GenderController extends Controller
{
    /**
     * Get gender
     * 
     * Select all the genders
     * 
     * @apiResourceCollection App\Http\Resources\GenderResource
     * @apiResourceModel App\Models\Gender
     */
    public function index()
    {
        $genders = Gender::all();
        return GenderResource::collection($genders);
    }
}
