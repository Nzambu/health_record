const initialState = {
    miniSidebar : false,
}
export const settings = {
    namespaced: true,
    state: initialState,
    actions: {
        
        /**
         * Get authenticated user profile
         * 
         */
        miniSidebar({ commit }, toggle) {
            let change = null
            if(toggle === true) {
                change = true;
            } else {
                change = false;
            }
            commit('miniSidebar', change);
            return change;
        },

    },
    mutations: {

        /**
         * Handle laoded user profile
         * 
         */
        miniSidebar(state) {
           state.miniSidebar = !state.miniSidebar
        },
    }
}