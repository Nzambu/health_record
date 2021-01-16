import Vue from 'vue';
import Vuex from 'vuex';

import {auth} from './AuthModule';
import {patient} from './PatientModule';
import {profile} from './ProfileModule';
import {settings} from './SettingModule'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex);

export default new Vuex.Store({
  plugins : [createPersistedState({ storage: window.sessionStorage })],
  state : {
  },
  mutations : {
  },
  actions : {
  },
  modules : {
    auth,
    patient,
    profile,
    settings
  }
});
