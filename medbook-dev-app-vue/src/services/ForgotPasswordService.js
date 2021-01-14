import Axios from './Axios'
class ForgotPasswordService {
    
    /**
     * Send reset password email
     * 
     * @param {*} email The registered user email
     */
    sendResetPasswordEmail(data) {
        return Axios({
            method : 'POST',
            url : 'forgot_password',
            data : data
        })
    }
}
export default new ForgotPasswordService;