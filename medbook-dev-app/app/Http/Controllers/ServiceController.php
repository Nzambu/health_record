<?php
/**
 * MedBookAfrica Interview
 * 
 * @author  Nzambu Nzioki <patricknzambu@gmail.com>
 * 
 */

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Resources\ServiceResource;

/**
 * @group Service
 *
 * Service endpoints
 * 
 * @package Controllers
 */
class ServiceController extends Controller
{
    /**
     * Get all services
     * 
     * Select all the services
     * 
     * @apiResourceCollection App\Http\Resources\ServiceResource
     * @apiResourceModel App\Models\Service
     */
    public function index()
    {
        $services = Service::all();
        return ServiceResource::collection($services);
    }
}
