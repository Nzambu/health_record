<template>
  <v-row>
    <v-col
      cols="8"
      sm="6"
      md="4"
      lg="4"
      xl="4"
    >
    <!-- <v-dialog
      v-model="dialog"
      persistent
      max-width="290"
    > -->
    <v-menu
        bottom
        offset-y
        class="pb-1"       
      >
      <!--  -->
      <template v-slot:activator="{ on, attrs }" >
        <v-btn icon
          v-bind="attrs"
          v-on="on"          
        >
        <!-- <v-icon>mdi-dots-vertical</v-icon> -->
          <v-avatar>
            <v-img src="https://gitlab.com/uploads/-/system/user/avatar/3883365/avatar.png"></v-img>
          </v-avatar>
        </v-btn>
      </template>
      <v-card>
          <div class="pt-5 text-center">
            <v-avatar>
              <v-img src="https://gitlab.com/uploads/-/system/user/avatar/3883365/avatar.png"></v-img>
            </v-avatar>
          </div>
            <v-card-text class="text-center pb-0">
            <b>{{profile.attributes.firstName}} {{profile.attributes.lastName}}</b>
            </v-card-text>        
            <v-card-text class="text-center pt-0">
              <span>{{profile.attributes.email}}</span>
            </v-card-text>
            <div class="text-center py-5">
              <!-- Redirect the user to the profile -->
              <v-btn
                class="blue white--text text-capitalize"
                light
                @click="$router.push('profile')"
              >
                Manage Account
              </v-btn>
              <!-- End -->
            </div>
            <v-divider></v-divider>
            <div class="text-center py-5">
              <v-btn
                class="red white--text text-capitalize"
                light
                @click="signOut"
              >
                Sign Out
              </v-btn>
            </div>
            <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
            class="text-capitalize"
          >
            Privacy Policy
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
            class="text-capitalize"
          >
            Terms of Service
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-menu>
    <!-- </v-dialog> -->
    </v-col>
  </v-row>
</template>
<script>
  export default {
    name : 'Dialog',
    data () {
      return {
        dialog: false,
        user: {
          attributes : {
            fullName : 'Patrick Nzambu',
            email : 'patrick@gmail.com'
          }
        }
      }
    },
    created()  {
        this.$nextTick(() => { 
          this.getUserProfile()
        })
    },
    mounted() {
      this.$nextTick(() => {
        this.refreshToken()
      })
    },
    computed: {
      profile() {
        let data = this.$store.state.profile.profile ?? null
        return data
      }
    },
    methods : {

      /**
       * Load user profile
       */
      getUserProfile() {
        this.$store.dispatch('profile/profile').then(
        response => {
          let data = response

          /**
           * Profile data retrieved successfully
           */
          if(data.status === 200) {
            console.log(data.data)
          }
        },
        error => {
          console.log(error.response)
        })
      },

      /**
       * Refresh the access token
       * 
       */
      refreshToken() {
        // let time = this.$store.state.auth.accessToken.expires_in
        // let interval = (time - 10)*1000
        // console.log(interval)
        // let k = 0
        // setInterval(() => {
        //   console.log(k++)
        // }, 10)
      },

      gotToUSerProfile() {
        window.location.replace='/profile'
      },
      
      /**
       * Log out or Sign out
       */
      signOut() {
        this.$store.dispatch('auth/logout').then(
        response => {
          console.log(response)
        },
        error => {
          console.log(error.response)
        })
      }
    }
  }
</script>