<?php
/**
 * MedBookAfrica Interview
 * 
 * @author  Nzambu Nzioki <patricknzambu@gmail.com>
 * 
 */

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Resources\PatientResource;

/**
 * @group Patient
 *
 * Patient endpoints
 * 
 * @package Controllers
 */
class PatientController extends Controller
{
    /**
     * Get patients
     * 
     * Select all the patients
     * 
     * @apiResourceCollection App\Http\Resources\PatientResource
     * @apiResourceModel App\Models\Patient
     */
    public function index()
    {
        $patients = Patient::all();
        return PatientResource::collection($patients);
    }

    /**
     * Create patient
     * 
     * Create new patient record
     * 
     * @apiResource App\Http\Resources\PatientResource
     * @apiResourceModel App\Models\Patient
     */
    public function store(PatientRequest $request, Patient $patient) {
        // Get patient fillable fields
        $data = $request->only($patient->getFillable());
        // Save the data
        $patient->fill($data)->save();
        // Return new patient
        return new PatientResource($patient);
    }

    /**
     * Update patient
     * 
     * Change patient record
     * 
     * @apiResource App\Http\Resources\PatientResource
     * @apiResourceModel App\Models\Patient
     */
    public function update(PatientRequest $request, $patient) 
    {
        // Find patient
        $user =  Patient::findOrFail($patient);
        $data = $request->only($user->getFillable());
        // Update record
        $user->fill($data)->update();
        // Return updated user
        return new PatientResource($user);
    }

    /**
     * Delete patient
     * 
     * Remove patient record
     * 
     * @apiResource App\Http\Resources\PatientResource
     * @apiResourceModel App\Models\Patient
     */
    public function destroy($patient)
    {
        // Find patient
        $user =  Patient::findOrFail($patient);
        // Delete patient
        $user->delete();
        // Return deleted patient
        return new PatientResource($user);
    }
}
