import Axios from './Axios';

class ResetPasswordService {

    /**
     * Verify the change password token
     * 
     * @param {*} token 
     */
    verifyResetPasswordToken = (token) => {
        return Axios({
            method : 'POST',
            url : 'verify_reset_password_token',
            data : {
                "token" : token
            }
        })
    }

    /**
     * Change the password
     * 
     * @param {*} data 
     */
    changePassword = (data) => {
        return Axios({
            method : 'POST',
            url : 'change_password',
            data : data
        })
    }

    profileChangePassword = (data) => {

        return Axios.post('profile_change_password', data);

        // return Axios({
        //     method : 'POST',
        //     url : 'profile_change_password',
        //     data : data
        // });
    }
}
export default new ResetPasswordService;