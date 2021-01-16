const initialState = {
    sidebarMini : false,
}
export const settings = {
    namespaced: true,
    state: initialState,
    actions: {
        
        /**
         * Get authenticated user profile
         * 
         */
        miniSidebar({ commit }) {
            commit('sidebarMini')
        },

    },
    mutations: {

        /**
         * Handle laoded user profile
         * 
         */
        sidebarMini(state) {
           state.sidebarMini = !state.sidebarMini
        },
    }
}