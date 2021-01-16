import ProfileService from '../services/ProfileService';
const initialState = {
    profile : [],
    emails : [],
    phones : []
}
export const profile = {
    namespaced: true,
    state: initialState,
    actions: {
        
        /**
         * Get authenticated user profile
         * 
         * @param {*} param0 
         */
        profile({ commit }) {

            /**
             * It uses bearer token to get authenticated user
             */
            return ProfileService.profile().then(
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
            return ProfileService.updateProfile(newData)
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
         * Add user email
         * 
         * @param {*} param0 
         * @param {*} mail 
         */
        addMail({ commit }, mail) {

            /**
             * Add user email
             */
            return ProfileService.addNewMail(mail)
            .then(
                feedback => {
                    let email = feedback
                    console.log(email.data)
                    commit('addMail', email.data)
                    return Promise.resolve(email)
                },
                fail => {
                    return fail
                }
            );
        },

        /**
         * Edit user email
         * 
         * @param {*} param0 
         * @param {*} mail 
         */
        editMail({ commit }, mail) {

            /**
             * Edit user email
             */
            return ProfileService.editMail(mail)
            .then(
                feedback => {
                    let email = feedback
                    commit('editMail', email.data)
                    return Promise.resolve(email)
                },
                fail => {
                    return fail
                }
            );
        },

        /**
         * Add user phone number
         * 
         * @param {*} param0 
         * @param {*} mail 
         */
        addPhone({ commit }, phone) {

            /**
             * Add user phone
             */
            return ProfileService.addNewPhone(phone)
            .then(
                feedback => {
                    let phoneNumber = feedback
                    commit('addPhone', phoneNumber.data)
                    return Promise.resolve(phoneNumber)
                },
                fail => {
                    return fail
                }
            );
        },

        /**
         * Edit user phone number 
         * 
         * @param {*} param0 
         * @param {*} mail 
         */
        editPhone({ commit }, phone) {

            /**
             * Edit user phone
             */
            return ProfileService.editPhone(phone)
            .then(
                feedback => {
                    let phoneNumber = feedback
                    commit('editPhone', phoneNumber.data)
                    return Promise.resolve(phoneNumber)
                },
                fail => {
                    return fail
                }
            );
        }
    },
    mutations: {

        /**
         * Handle laoded user profile
         * 
         * @param {*} state 
         * @param {*} profile 
         */
        profileSuccess(state, profile) {
            state.profile = profile
            state.emails = profile.relationships.email[0]
            state.phones = profile.relationships.phone[0]
        },

        /**
         * Handle update user profile
         * 
         * @param {*} state 
         * @param {*} newProfile 
         */
        updateProfile(state, newProfile) {
            state.profile = newProfile
            state.emails = newProfile.relationships.email[0]
            state.phones = newProfile.relationships.phone[0]
        },

        /**
         * Handle add user email
         * 
         * @param {*} state 
         * @param {*} email 
         */
        addMail(state, email) {
            state.emails.push(email)
        },

        /**
         * Handle edit user email
         * 
         * @param {*} state 
         * @param {*} newEmail 
         */
        editMail(state, updatedEmail) {
            let mailList = state.emails
            let mailIndex = mailList.findIndex( mail => mail.id === updatedEmail.id)
            if(mailIndex !== -1) {
                mailList.splice(mailIndex, 1, updatedEmail)
            }
        },

        /**
         * Handle add user phone
         * 
         * @param {*} state 
         * @param {*} phone 
         */
        addPhone(state, phone) {
            state.phones.push(phone)
        },

        /**
         * Handle edit user phone
         * 
         * @param {*} state 
         * @param {*} newPhone 
         */
        editPhone(state, updatedPhone) {
            let phoneList = state.phones
            let phoneIndex = phoneList.findIndex( mail => mail.id === updatedPhone.id)
            if(phoneIndex !== -1) {
                phoneList.splice(phoneIndex, 1, updatedPhone)
            }
        },

        /**
         * Handle failed to load profile
         */
        profileFail(state, error) {
            state.profileError = error
        },
    }
}