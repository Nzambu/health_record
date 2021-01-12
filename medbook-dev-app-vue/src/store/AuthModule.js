import AuthService from '../services/AuthService';

// const token = JSON.parse(sessionStorage.getItem('token'));
// console.log(token)
// let status = token ? { 
//         status: { loggedIn: true, token : token }
//     } : { 
//         status: { loggedIn: false,token : null }
//     }
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
        login({ commit }, user) { 
            return AuthService.login(user).then(
                accessToken => {
                    commit('loginSuccess', accessToken.data);
                    return Promise.resolve(accessToken);
                },
                error => {
                    console.log(error)
                    commit('loginFailure');
                    return Promise.reject(error);
                }
            );
        },
        profile({ commit }) {
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
        logout({ commit }) {
            AuthService.logout();
            commit('logout');
        },
    },
    mutations: {
        loginSuccess(state, accessToken) {
            state.loggedIn = true;
            state.token = accessToken.attributes.access_token
            state.accessToken = accessToken.attributes;
        },
        loginFailure(state) {
            state.status.loggedIn = false;
            state.user = null;
        },
        profileSuccess(state, profile) {
            state.profile = profile
        },
        profileFail(state, error) {
            state.profileError = error
        },
        logout(state) {
            state.loggedIn = false;
            state.token = null;
            state.accessToken = null;
        }
    }
}
