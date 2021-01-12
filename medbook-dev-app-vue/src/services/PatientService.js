import Axios from './Axios'
class PatientService {

    /**
     * Get a list of all patients
     */
    getPatientList() { 
        return Axios({
            method: 'GET',
            url: 'patient'
        })
    }

    /**
     * Create new patient
     * 
     * @param data New patient data
     */
    saveNewPatient(data) {
        return Axios({
            method : 'POST',
            url : 'patient',
            data : data
        })
    }

    /**
     * Update Patient record
     * 
     * @param data Changed patient data
     */
    updatePatient(data) {
        return Axios({
            method : 'UPDATE',
            url : 'patient/'+data.patientID,
            data : data
        })
    }

    /**
     * Delete patient record
     * 
     * @param patientID Patient id
     */
    deletePatient(patientID) {
        return Axios({
            method : 'DELETE',
            url : 'patient/'+patientID
        })
    }
}
export default new PatientService;
