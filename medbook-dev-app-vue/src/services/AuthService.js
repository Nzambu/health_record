import Axios from './Axios'
class AuthService {
    login(data) { 
        return Axios({
            method: 'POST',
            url: 'login',
            data : data
        })
    }

    profile = () => {
        return Axios({
            method : 'GET',
            url : 'profile'
        })
    }

    logout() {
        // Axios({
        //     method: 'GET',
        //     url: 'auth/logout',
        // })
        sessionStorage.removeItem('vuex')
        sessionStorage.removeItem('token')
        window.location.replace('/login')
    }
}
export default new AuthService;
