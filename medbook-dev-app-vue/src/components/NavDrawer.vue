<template>
    <!-- <Sidebar v-model="drawer"/> -->
    <v-navigation-drawer
      fixed
      :mini-variant.sync="mini"
      color="default"      
      app
      clipped
    >
    <!-- <v-navigation-drawer
      permanent
      expand-on-hover
      app
      absolute
      clipped
    > -->
      <v-list
          nav
          dense
        >
          <v-list-item link to='/patient'>
            <v-list-item-icon>
              <v-icon class="light-blue--text">mdi-face</v-icon>
            </v-list-item-icon>
            <v-list-item-title class="light-blue--text">Patients</v-list-item-title>
          </v-list-item>
          <!-- <v-list-item link to='/profile'>
            <v-list-item-icon>
              <v-icon class="light-blue--text">mdi-face</v-icon>
            </v-list-item-icon>
            <v-list-item-title class="light-blue--text">Profile</v-list-item-title>
          </v-list-item> -->
        </v-list>
    </v-navigation-drawer>
</template>
<script>
// import Dialog from './Dialog'
// import Sidebar from './Sidebar'
export default {
    name: 'NavDrawer',
    data () {
      return {
        // mini : false
      }
    },
    computed : {
      mini() {
        return this.$store.state.settings.miniSidebar
      }
    },
    components : {
        // Dialog,
        // Sidebar
    }
}
</script>