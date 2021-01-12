import PatientService from '../services/PatientService';

const initialState = {
    list : null,
    error : null,
}
export const patient = {
    namespaced: true,
    state: initialState,
    actions: {
        /**
         * List all the patients
         * 
         * @param {*} param) commit to vuex
         */
        getList({ commit }) { 
            return PatientService.getPatientList().then(
                patient => {
                    let list = patient.data
                    commit('list', list);
                    return Promise.resolve(list);
                },
                error => {
                    console.log(error)
                    commit('fail');
                    return Promise.reject(error);
                }
            );
        },

        /**
         * Save a new patient
         * @param {*} param0 commit to vuex
         * @param {*} patient 
         */
        savePatient({ commit }, patient) {
            return PatientService.saveNewPatient(patient).then(
                patient => {
                    let record = patient.data
                    commit('save', record);
                    return Promise.resolve(record)
                },
                error => {
                    commit('fail');
                    return Promise.reject(error);
                }
            );
        },

        /**
         * Update patient record
         * @param {*} param0 commit to vuex
         * @param {*} patient details for patient
         */
        updatePatient({ commit }, patient) {
            return PatientService.updatePatient(patient).then(
                patient => {
                    let record = patient.data
                    commit('update', record);
                    return Promise.resolve(record)
                },
                error => {
                    commit('fail');
                    return Promise.reject(error);
                }
            );
        },

        /**
         * Delete patient record
         * @param {*} param0 commit to vuex
         * @param {*} patientID 
         */
        deletePatient({ commit }, patientID) {
            return PatientService.deletePatient(patientID).then(
                patient => {
                    let record = patient.data
                    commit('delete', record);
                    return Promise.resolve(record)
                },
                error => {
                    commit('fail');
                    return Promise.reject(error);
                }
            );
        }
    },
    mutations: {
        list(state, patientList) {
            state.list = patientList
        },
        save(state, newPatient) {
            state.list.unshift(newPatient)
        },
        update(state, updatedPatient) {
            let patientIndex = state.list.findIndex( patient => patient.id === updatedPatient.id)
            if(patientIndex !== -1) {
                state.list.splice(patientIndex, 1, updatedPatient)
            }
        },
        delete(state, patientID) {
            state.list = state.list.filter((patients) => patients.id !== patientID)
        },
        fail(state, error) {
            state.error = error
        }
    }
}
