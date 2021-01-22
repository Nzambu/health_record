<template>
  <v-app>

    <!-- <v-container fill-height fluid> -->
      <router-view></router-view>
    <!-- </v-container> -->

  </v-app>

</template>

<script>
import Axios from './services/Axios';
// import HelloWorld from './components/HelloWorld';
// require('@/assets/styles/main.css')

export default {
  name: 'App',

  components: {
    // HelloWorld,
  },

  data() {
    return {
      
    }
  },

  created () {
    Axios.interceptors.response.use(
      response => {
        return response
      },
      error => {
        if(error.response.status === 401) {
          return this.$store.dispatch('auth/logout')
        } else {
          return Promise.reject(error);
        }
    });
  }
};
</script>
