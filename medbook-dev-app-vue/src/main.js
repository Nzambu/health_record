import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import vuetify from './plugins/vuetify';
import VueJWT from 'vuejs-jwt';
import VueSignaturePad from 'vue-signature-pad';
import * as VeeValidate from 'vee-validate';
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import './plugins/vee-validation';

Vue.config.productionTip = false;
Vue.use(VueJWT);
Vue.use(VeeValidate);
Vue.use(VueSignaturePad);
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app');
