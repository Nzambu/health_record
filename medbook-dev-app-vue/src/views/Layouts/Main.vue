<template>
  <v-app>
    <NavDrawer />
    <AppBar />
    <v-main>     
        <!-- include v-container in both the Main.vue and views/xxxx.vue  -->
      <!-- <v-container fill-height fluid padding-zero>
          <router-view></router-view> 
      </v-container> -->
       <v-container fluid padding-zero>
          <router-view></router-view> 
      </v-container>
    </v-main>
  </v-app>
</template>
<script>
import AppBar from "@/components/AppBar.vue";
import  NavDrawer from '@/components/NavDrawer.vue'

export default {
  name: "Main",

  components: {
    AppBar,
    NavDrawer
    // Footer
  },

  data: () => ({}),
};
</script>
<style>
.padding-zero {
  padding :0px;
}
</style>