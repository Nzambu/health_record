import AuthService from '../services/AuthService';
const initialState = {
    profile : null,
    loggedIn : null,
    token : null,
    accessToken : null,
}
export const auth = {
    namespaced: true,
    state: initialState,
    actions: {

        /**
         * Login a user
         * 
         * @param {*} param0 
         * @param {*} user 
         */
        login({ commit }, user) { 
            return AuthService.login(user).then(
                accessToken => {
                    if(accessToken.data.attributes !== undefined) {
                        commit('loginSuccess', accessToken.data);
                    }
                    return Promise.resolve(accessToken);
                },
                error => {
                    commit('loginFailure');
                    return Promise.reject(error);
                }
            );
        },

        /**
         * Send reset user password email
         * 
         * @param {*} param0 
         * @param {*} email 
         */
        sendResetPasswordEmail({ commit }, email) {
            console.log(email)
            return AuthService.sendResetPasswordEmail(email).then(
                email => {
                    commit('');
                    return Promise.resolve(email)
                },
                error => {
                    return Promise.reject(error)
                }
            );
        },
        
        /**
         * Get authenticated user profile
         * 
         * @param {*} param0 
         */
        profile({ commit }) {

            /**
             * It uses bearer token to get authenticated user
             */
            return AuthService.profile().then(
                userProfile => {
                    let profile = userProfile.data
                    commit('profileSuccess', profile)
                    return Promise.resolve(profile)
                },
                error => {
                    console.log(error)
                    commit('profileFail', error)
                    return Promise.resolve(error)
                }
            );
        },

        /**
         * Update user profile data
         * 
         * @param {*} param0 
         * @param {*} profile 
         */
        updateProfile({ commit }, newData) {

            /**
             * Update user profile
             */
            return AuthService.updateProfile(newData)
                .then(
                profile => {
                    let updatedProfileData = profile;
                    commit('updateProfile', updatedProfileData.data);
                    return Promise.resolve(updatedProfileData);
                },
                error => {
                    return error
                });
        },

        /**
         * Loug out the user
         * 
         * @param {*} param0 
         */
        logout({ commit }) {
            AuthService.logout();
            commit('logout');
        },
    },
    mutations: {

        /**
         * Set loggein, token and access token
         * 
         * @param {*} state 
         * @param {*} accessToken 
         */
        loginSuccess(state, accessToken) {
            state.loggedIn = true;
            state.token = accessToken.attributes.access_token
            state.accessToken = accessToken.attributes;
        },

        /**
         * Handle login failure
         * 
         * @param {*} state 
         */
        loginFailure(state) {
            state.user = null;
        },

        /**
         * Handle laoded user profile
         * @param {*} state 
         * @param {*} profile 
         */
        profileSuccess(state, profile) {
            state.profile = profile
        },

        /**
         * Handle update user profile
         * 
         * @param {*} state 
         * @param {*} newProfile 
         */
        updateProfile(state, newProfile) {
            state.profile = newProfile
        },

        /**
         * Handle failed to load profile
         */
        profileFail(state, error) {
            state.profileError = error
        },

        /**
         * Handle logout
         * 
         * @param {*} state 
         */
        logout(state) {
            state.loggedIn = false;
            state.token = null;
            state.accessToken = null;
        }
    }
}
