import Axios from './Axios';
class ProfileService {

    /**
     * Get authenticated user profile data
     */
    profile = () => {
        return Axios({
            method : 'GET',
            url : 'profile'
        })
    }

    /**
     * Update user profile
     * 
     * @param {*} data new data
     */
    updateProfile = (data) => {
        return Axios({
            method : 'POST',
            url : 'update_profile',
            data : data
        })
    }
    
    /**
     * Add new and unique user email
     * 
     * @param {*} data 
     */
    addNewMail = (data) => {
        return Axios({
            method : 'POST',
            url : 'email',
            data : data
        });
    }

    /**
     * Edit an existing user email
     * 
     * @param {*} data 
     */
    editMail = (data) => {
        return Axios({
            method : 'POST',
            url : 'email/' + data.id,
            data : data
        });
    }

    /**
     * Add new and unique user phone number
     * 
     * @param {*} data 
     */
    addNewPhone = (data) => {
        return Axios({
            method : 'POST',
            url : 'phone',
            data : data
        });
    }

    /**
     * Edit an existing phone number
     * 
     * @param {*} data 
     */
    editPhone = (data) => {
        return Axios({
            method : 'POST',
            url : 'phone/' + data.id,
            data : data
        });
    }

    /**
     * switch primary phone number
     * 
     * @param {*} data 
     */
    switchPrimaryPhone = (data) => {
        return Axios({
            method : 'POST',
            url : 'switch_primary_phone',
            data : {
                "phone" : data.phone
            }
        });
    }

    /**
     * switch primary email
     * 
     * @param {*} data 
     */
    switchPrimaryEmail = (data) => {
        return Axios({
            method : 'POST',
            url : 'switch_primary_email',
            data : {
                "email" : data.email
            }
        });
    }
    
    

}
export default new ProfileService;