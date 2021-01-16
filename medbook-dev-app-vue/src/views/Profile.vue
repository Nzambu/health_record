<template>
  <v-container>
    <v-card>
      <v-card-title class="px-10 py-0">
        <v-row>
          <v-col lg="6">            
            <v-list-item one-line>
                <v-list-item-content>
                    <v-list-item-title>User Profile</v-list-item-title>
                </v-list-item-content>
            </v-list-item>            
          </v-col>
          <v-col lg="6">
            <v-row>
              <v-spacer></v-spacer>
              <v-tooltip bottom>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                class="blue white--text text-capitalize"
                @click="toggleEditProfile"
                v-bind="attrs"
                v-on="on"
              >Profile
                <v-icon v-if="showProfile"
                  class="white--text"                
                >mdi-pencil</v-icon>
                <v-icon v-if="!showProfile"
                  class="white--text"                
                >mdi-close</v-icon>
              </v-btn>
            </template>
            <span>Edit Profile</span>
          </v-tooltip>
            </v-row>            
          </v-col>
        </v-row> 
      </v-card-title>
      <v-divider></v-divider>
      <v-row>
        <v-col lg="12" class="text-center">
          <v-avatar size="200">
            <v-img src="https://gitlab.com/uploads/-/system/user/avatar/3883365/avatar.png"></v-img>
          </v-avatar>
        </v-col>
      </v-row>          
      <v-row v-if="showProfile">
        <v-col lg="12" class="text-center">
          <v-list>
            <v-list-item two-line>
              <v-list-item-title>
                {{profile.attributes.name}}
              </v-list-item-title>
            </v-list-item>
            <v-list-item>
              <v-list-item-title>
                {{profile.attributes.email}}
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </v-col>
      </v-row> 
      <v-row v-if="!showProfile"
        class="px-10"
      >
        <v-col 
          lg="6"
          offset-lg="3"
        >

          <!-- Edit user Profile -->

          <validation-observer
            ref="profileObserver"
            v-slot="{}"
          >
            <v-form
                lazy-validation
            >
              <validation-provider
                v-slot="{errors}"
                name="First Name"
                rules="required"
              >
                <v-text-field
                    v-model="user.first_name"
                    :error-messages="errors"
                    label="First Name"
                    type="text"
                    required
                ></v-text-field>
              </validation-provider>
              <validation-provider
                  v-slot="{errors}"
                  name="Last Name"
                  rules="required"
              >
                <v-text-field
                    v-model="user.last_name"
                    :error-messages="errors"
                    label="Last Name"
                    type="text"
                    required
                ></v-text-field>
              </validation-provider>
              <!-- <validation-provider
                v-slot="{errors}"
                name="Sex"
                rules="required"
              >
                <v-select
                  v-model="user.sex"
                  :error-messages="errors"
                  :items="['Undisclosed', 'Female', 'Male']"
                  label="Sex"
                  persistent-hint
                  return-object
                  single-line
                ></v-select>
              </validation-provider> -->
              <v-row class="pt-5">
                <v-col lg="12">
                  <v-btn block
            
                    class="success text-capitalize"
                    @click="handleUpdateProfile"
                  >Save Changes</v-btn>
                </v-col>
              </v-row>
            </v-form>
          </validation-observer>

          <!-- End -->

        </v-col>
      </v-row>
    </v-card>
    <v-card class="my-10">
      <v-card-title class="px-10 py-0">
        <v-row>
          <v-col lg="6">
          <v-list-item one-line>
              <v-list-item-content>
                  <v-list-item-title>My Emails Addresses</v-list-item-title>
              </v-list-item-content>
          </v-list-item>
          </v-col>
          <v-col lg="6">
            <v-row>
            <v-spacer></v-spacer>            
            <v-tooltip bottom>
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  class="blue white--text text-capitalize"
                  @click="toggleAddEmail"
                  v-bind="attrs"
                  v-on="on"
                >Email
                  <v-icon v-if="showEmail"
                    class="white--text"                
                  >mdi-plus</v-icon>
                  <v-icon v-if="!showEmail"
                    class="white--text"                
                  >mdi-close</v-icon>
                </v-btn>
              </template>
              <span>Add Email</span>
            </v-tooltip> 
            </v-row>            
          </v-col>
        </v-row>
        </v-card-title>
        <v-divider></v-divider>
        <v-row class="px-10">
          <v-col v-if="showEmail"
            lg="12"
          >
            <v-list>
              <v-list-item 
                two-line 
                v-for="email in emailList"
                :key="email.id"                
              >
                <v-list-item-content >                  
                  <v-list-item-title      
                  >
                    <v-avatar color="blue" size="40">
                      <v-icon class="white--text">mdi-phone-outline</v-icon>
                    </v-avatar>
                    {{ email.attributes.email }}
                  </v-list-item-title>
                  <v-list-item-subtitle v-if="email.attributes.primary">Primary</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-col>
          <v-col v-if="!showEmail"
            offset-lg="3"
            lg="6"
          >
            <v-form
                lazy-validation
            >
              <validation-observer
                  ref="emailObserver"
                  v-slot="{}"
              >
                <validation-provider
                  v-slot="{errors}"
                  name="Email"
                  rules="required"
                >
                  <v-text-field
                      v-model="user.email"
                      :error-messages="errors"
                      label="Email"
                      type="email"
                      required
                  ></v-text-field>
                </validation-provider>
                <v-row class="pt-5">
                  <v-col lg="12">
                    <v-btn block
                      
                      class="success text-capitalize"
                      @click="handleAddEmail"
                    >Save Changes</v-btn>
                  </v-col>
                </v-row>
              </validation-observer>
            </v-form>
          </v-col>
        </v-row>
    </v-card>
    <v-card class="my-10">
      <v-card-title class="px-10 py-0">
        <v-row>
          <v-col lg="6">
            <v-list-item one-line>
              <v-list-item-content>
                  <v-list-item-title>My Phone Numbers</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-col>
          <v-col lg="6">
            <v-row>
              <v-spacer></v-spacer>              
              <v-tooltip bottom>
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      class="blue white--text text-capitalize"
                      @click="toggleAddPhone"
                      v-bind="attrs"
                      v-on="on"
                    >Phone
                      <v-icon v-if="showPhone"
                        class="white--text"                  
                      >mdi-plus</v-icon>
                      <v-icon v-if="!showPhone"
                        class="white--text"                  
                      >mdi-close</v-icon>
                    </v-btn>
                  </template>
                  <span>Add Phone</span>
                </v-tooltip> 
            </v-row>            
          </v-col>
        </v-row>
        </v-card-title>
        <v-divider></v-divider>
        <v-row class="px-10">
          <v-col v-if="showPhone"
            lg="12"
          >
            <v-list>
              <v-list-item 
                two-line 
                v-for="phone in phoneList"
                :key="phone.id"                
              >
                <v-list-item-content >                  
                  <v-list-item-title      
                  >
                    <v-avatar color="blue" size="40">
                      <v-icon class="white--text">mdi-phone-outline</v-icon>
                    </v-avatar>
                    {{ phone.attributes.phone }}
                  </v-list-item-title>
                  <v-list-item-subtitle v-if="phone.attributes.primary">Primary</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-col>
          <v-col v-if="!showPhone"
            offset-lg="3" 
            lg="6"
          >
            <v-form
                lazy-validation
            >
              <validation-observer
                  ref="phoneObserver"
                  v-slot="{}"
              >
                <validation-provider
                  v-slot="{errors}"
                  name="Phone Number"
                  rules="required"
                >
                  <v-text-field
                      v-model="user.phone"
                      :error-messages="errors"
                      label="Phone"
                      type="number"
                      required
                  ></v-text-field>
                </validation-provider>
                <v-row class="pt-5">
                  <v-col lg="12">
                    <v-btn block
                      
                      class="success text-capitalize"
                      @click="handleAddPhone"
                    >Save New Number</v-btn>
                  </v-col>
                </v-row>
              </validation-observer>
            </v-form>
          </v-col>
        </v-row>
    </v-card>
    <v-card class="my-10">
      <v-card-title class="px-10">
          <v-row>
            <v-col lg="6">
              <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-title>Account Security</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-col>
            <v-col lg="6">
              <v-row>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      class="blue white--text text-capitalize"
                      @click="toggleChangePassword"
                      v-bind="attrs"
                      v-on="on"
                    >Password
                      <v-icon v-if="showPassword"
                        class="white--text"
                      >mdi-pencil</v-icon>
                      <v-icon v-if="!showPassword"
                        class="white--text"
                      >mdi-close</v-icon>
                    </v-btn>
                  </template>
                  <span>Change Password</span>
                </v-tooltip>                
              </v-row>
            </v-col>
          </v-row>
        </v-card-title>
        <v-divider></v-divider>
        <v-row class="px-10">
          <v-col v-if="showPassword"
            lg="12"
            class="text-center"
          >
            <v-list-item two-line>
              <v-list-item-content>
                  <v-list-item-title>Last changed</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-col>
          <v-col v-if="!showPassword"
            offset-lg="3"
            lg="6"
          >            
            <v-form
                lazy-validation
            >
              <validation-observer
                  ref="passwordObserver"
                  v-slot="{}"
              >
                <validation-provider
                      v-slot="{errors}"
                      name="Current Password"
                      rules="required"
                  >
                      <v-text-field
                          v-model="user.email"
                          :error-messages="errors"
                          label="Current Password"
                          type="password"
                          required
                      ></v-text-field>
                  </validation-provider>
                  <validation-provider
                      v-slot="{errors}"
                      name="Password"
                      rules="required"
                  >
                      <v-text-field
                          v-model="user.email"
                          :error-messages="errors"
                          label="Password"
                          type="password"
                          required
                      ></v-text-field>
                  </validation-provider>
                  <validation-provider
                      v-slot="{errors}"
                      name="Password Confirmation"
                      rules="required"
                  >
                      <v-text-field
                          v-model="user.password"
                          :error-messages="errors"
                          label="Password Confirmation"
                          type="password"
                          required
                      ></v-text-field>
                  </validation-provider>
                  <v-row class="pt-5">
                      <v-col lg="12">
                          <v-btn block
                              
                              class="success text-capitalize"
                              @click="handleChangePassword"
                          >Change Password</v-btn>
                      </v-col>
                  </v-row>
              </validation-observer>
          </v-form>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
import Auth from '../models/Auth';
export default {
  name: 'Profile',
  data() {
    return {
      user : new Auth(),
      showProfile : true,
      showEmail : true,
      showPhone : true,
      showPassword : true,
    }
  },
  created() {
    this.$nextTick(() => {
      this.setProfileData()
    })
  },
  computed : {

    /**
     * Get user profile data
     */
    profile() {
      let data = this.$store.state.profile.profile
      return data
    },

    /**
     * List user emails
     */
    emailList() {
      return this.$store.state.profile.emails
    },

    /**
     * List user phone numbers
     */
    phoneList() {
      return this.$store.state.profile.phones
    },
  },
  watch : {
    profile(newProfile, oldProfile) {
      if(newProfile !== oldProfile) {
        this.setProfileData()
      }
    }
  },
  methods : {
    /**
     * Toggle show/edit profile
     */
    toggleEditProfile() {
      this.showProfile = !this.showProfile
    },

    /**
     * Toggle add email
     */
    toggleAddEmail() {
      this.showEmail = !this.showEmail
    },

    /**
     * Toggle add email
     */
    toggleAddPhone() {
      this.showPhone = !this.showPhone
    },

    /**
     * Toggle add email
     */
    toggleChangePassword() {
      this.showPassword = !this.showPassword
    },

    /**
     * Profile data
     */
    setProfileData()
    {
      if(this.showProfile === true) {
        this.user.first_name = this.profile.attributes.firstName
        this.user.last_name = this.profile.attributes.lastName
      }
    },

    /**
     * Update user profile
     */
    handleUpdateProfile() {
      this.$refs.profileObserver.validate()
      .then(
        dataIsValid => {
          if(dataIsValid === true)
          {
            this.$store.dispatch('profile/updateProfile', this.user)
            .then(
              feedback => {
                let status = feedback.status
                console.log(status)
                switch(status) {
                  case 200 :
                     this.toggleEditProfile()
                    break;
                  case 422 :
                    console.log(feedback.data.errors)
                    break;
                  default :
                    console.log('This is default');
                }
              }
            );
          }
        });

    },

    /**
     * Change user password
     */
    handleChangePassword() {
      this.$refs.passwordObserver.validate();
    },

    /**
     * Add new email
     */
    handleAddEmail() {
      this.$refs.emailObserver.validate().then(
        isValid => {
          if(isValid === true) {
            return this.$store.dispatch('profile/addMail', this.user)
            .then(
              feedback => {     
                let status = feedback.status           
                if(status === 201) {
                  this.toggleAddEmail()
                }
              },
              error => {
                console.log(error)
              });
          }
        }
      );
    },

    /**
     * Add new phone number
     */
    handleAddPhone() {
      this.$refs.phoneObserver.validate().then(
         isValid => {
          if(isValid === true) {
            return this.$store.dispatch('profile/addPhone', this.user)
            .then(
              feedback => {
                let status = feedback.status
                if(status === 201) {
                  this.toggleAddPhone()
                }
              },
              error => {
                console.log(error)
              });
          }
        }
      );
    },
  }
  
};
</script>
