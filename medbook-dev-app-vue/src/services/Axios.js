import axios from 'axios'
    const access_token = sessionStorage.getItem('token');
    let token = access_token ? JSON.parse(access_token) : null
    // var bearerToken = access_token ? data.token.access_token : null


    const Axios = axios.create({
        baseURL: 'http://localhost:8000/api/',
        // baseURL : 'http://backend.nvc-invoice.com/',
        // timeout : 1000,
        headers: { common : {
            'Accept' : 'application/json',
            'Content-type' : 'application/json',
            'Authorization' : 'Bearer '+ token
        }}
    });

    Axios.interceptors.response.use((response) => {
        // console.log("response " + response.status)
        return response;
    }, (errors) => {
        let error = errors.response
        if(error.status === 401) {
            /**
             * unauthorized user is logged out and redirected to the same page upon login
             * 
             * Clear expired token
             */
            sessionStorage.removeItem('token')

            // Get current pathname
            let redirectTo = window.location.pathname

            // Redirect to the pathname
            self.location = redirectTo
            
        }
        return error
        // if (error.response && error.response.data) {
             //add your code
            //   alert("error :" + error.response.data);
            // <Dialog/>
            //  console.log(error.response.data)
            //  return Promise.reject(error.response.data);
        // }
        // return Promise.reject(error.message);
    });
export default Axios;