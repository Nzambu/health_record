<template>
  <v-container>
    <v-card>
      <v-card-title class="px-10 py-0">
        <v-row>
          <v-col lg="6">            
            <v-list-item one-line>
                <v-list-item-content>
                    <v-list-item-subtitle>User Profile</v-list-item-subtitle>
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
                small
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
          <v-avatar size="100">
            <v-img src="https://gitlab.com/uploads/-/system/user/avatar/3883365/avatar.png"></v-img>
          </v-avatar>
        </v-col>
      </v-row>          
      <v-row v-if="showProfile">
        <v-col lg="12" class="text-center">
          <v-list>
            <v-list-item two-line>
              <v-list-item-subtitle>
                {{profile.attributes.name}}
              </v-list-item-subtitle>
            </v-list-item>
            <v-list-item>
              <v-list-item-subtitle>
                {{profile.attributes.email}}
              </v-list-item-subtitle>
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
      <v-card-title class="px-10">
        <v-row>
          <v-col lg="6">
            <v-list-item two-line>
              <v-list-item-content>
                  <v-list-item-subtitle>Account Security</v-list-item-subtitle>
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
                    small
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
              <v-list-item-subtitle class="py-3">* * * * * * * *</v-list-item-subtitle>
                <v-list-item-subtitle>{{ formatCreationDate(passwordCreationDate)}}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-col>
        <v-col v-if="!showPassword"
          offset-xl="3"
          xl="6"
          offset-lg="3"
          lg="6"
          offset-md="3"
          md=6
          sm="12"
          xs="12"
        >   
          <v-alert v-if="error"
            prominent
            type="error"
          >
            <v-row align="center">
              <v-col class="grow">
                <v-list-item two-line 
                  v-for="(error, index) in error"
                  :key="index"
                >
                  <v-list-item-content>
                    <v-list-item-title v-text="error[0]"></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-col>
            </v-row>
          </v-alert>          
          <v-dialog
            v-model="successMessageDialog"
            persistent
            max-width="600"
          >
            <!-- <template v-slot:activator="{ on, attrs }">
              <v-btn
                color="primary"
                dark
                v-bind="attrs"
                v-on="on"
              >
                Open Dialog
              </v-btn>
            </template> -->
            <v-card
              class="px-5 pt-10"
            >
              <!-- <v-card-title class="headline text-center">
                {{ successMessage }}
              </v-card-title> -->
              <v-card-text>
                <v-alert
                  prominent
                  type="success"
                >
                  <v-row align="center">
                    <v-col class="grow">
                      <v-list-item two-line>
                        <v-list-item-content>
                          <v-list-item-title>{{ successMessage }}</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-col>                    
                  </v-row>
                </v-alert>
                <v-row>
                  <v-col 
                      xl="12"
                      lg="12"
                      md="12"
                      sm="12"
                      xs="12"
                      class="px-10"
                    >
                      <v-list-item>
                        <v-list-item-subtitle class="text-center">
                          Redirecting to login <br/> <p class=" py-5">{{ redirectToLoginTimer }}</p>
                        </v-list-item-subtitle>
                      </v-list-item>
                    </v-col>
                </v-row>
              </v-card-text>
              <!-- <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  color="green darken-1"
                  text
                  @click="dialog = false"
                >
                  Disagree
                </v-btn>
                <v-btn
                  color="green darken-1"
                  text
                  @click="dialog = false"
                >
                  Agree
                </v-btn>
              </v-card-actions> -->
            </v-card>
          </v-dialog>
          <v-form
            lazy-validation
          >
            <validation-observer
              ref="passwordObserver"
            >
              <validation-provider
                v-slot="{errors}"
                name="Current Password"
                rules="required"
              >
                <v-text-field
                  v-model="password.previous_password"
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
                  v-model="password.password"
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
                  v-model="password.password_confirmation"
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
    <v-card class="my-10">
      <v-card-title class="px-10 py-0">
        <v-row>
          <v-col lg="6">
          <v-list-item one-line>
              <v-list-item-content>
                  <v-list-item-subtitle>My Emails Addresses</v-list-item-subtitle>
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
                  small
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
                  <!-- <v-list-item-title>
                    <v-avatar color="blue" size="40">
                      <v-icon class="white--text">mdi-phone-outline</v-icon>
                    </v-avatar>
                    {{ email.attributes.email }}
                  </v-list-item-title> -->
                  <v-hover v-slot="{ hover }">
                    <v-row
                      :elevation="hover ? 12 : 2"
                      :class="{ 'on-hover': hover }"
                    >
                      <v-col>
                        <v-list-item-subtitle>
                          <v-avatar 
                            :class="{ 
                              'blue' : email.attributes.primary, 
                              'red' : !email.attributes.primary  
                            }" 
                            size="40"
                          >
                            <v-icon class="white--text">mdi-phone-outline</v-icon>
                          </v-avatar>
                          {{ email.attributes.email }}
                        </v-list-item-subtitle>
                      </v-col>
                      <v-col
                        :class="{'d-none' : !hover }"
                      >
                        <v-list-item-subtitle
                          class="py-2"
                        >
                          {{ formatCreationDate(email.attributes.difference) }}
                        </v-list-item-subtitle>
                      </v-col>
                      <v-col class="text-center" 
                        :class="{'d-flex' : hover }"
                      >
                        <v-list-item-subtitle  
                          class="py-2"
                        >
                          <v-btn v-if="email.attributes.primary"
                            rounded
                            class="text-capitalize white--text"
                            :class="{ 'success': hover, 'd-none' : !hover }"
                            x-small
                          >Primary</v-btn>
                          <v-btn v-if="!email.attributes.primary"
                            rounded
                            class="text-capitalize white--text"
                            :class="{ 'blue': hover, 'd-none' : !hover }"
                            x-small
                            @click="switchPrimaryEmail(email)"
                          >Make Primary</v-btn>
                        </v-list-item-subtitle> 

                      </v-col>
                    </v-row>
                  </v-hover>
                  <!-- <v-list-item-subtitle v-if="email.attributes.primary">Primary</v-list-item-subtitle> -->
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
                  <v-list-item-subtitle>My Phone Numbers</v-list-item-subtitle>
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
                      small
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
                <!-- <v-list-item-content >                  
                  <v-list-item-subtitle>
                    <v-avatar color="blue" size="40">
                      <v-icon class="white--text">mdi-phone-outline</v-icon>
                    </v-avatar>
                    {{ phone.attributes.phone }}
                  </v-list-item-subtitle>
                  <v-list-item-subtitle v-if="phone.attributes.primary">Primary</v-list-item-subtitle>
                </v-list-item-content> -->
                <v-hover v-slot="{ hover }">
                    <v-row
                      :elevation="hover ? 12 : 2"
                      :class="{ 'on-hover': hover }"
                    >
                      <v-col>
                        <v-list-item-subtitle>
                          <v-avatar 
                            :class="{ 
                              'blue' : phone.attributes.primary, 
                              'red' : !phone.attributes.primary  
                            }" 
                            size="40"
                          >
                            <v-icon class="white--text">mdi-phone-outline</v-icon>
                          </v-avatar>
                          {{ phone.attributes.phone }}
                        </v-list-item-subtitle>
                      </v-col>
                      <v-col
                        :class="{'d-none' : !hover }"
                      >
                        <v-list-item-subtitle
                          class="py-2"
                        >
                          {{ formatCreationDate(phone.attributes.difference) }}
                        </v-list-item-subtitle>
                      </v-col>
                      <v-col  
                        :class="{'d-flex' : hover }"
                      >
                        <v-list-item-subtitle  
                          class="py-2 text-center"
                        >
                          <v-btn v-if="phone.attributes.primary"
                            rounded
                            class="text-capitalize white--text"
                            :class="{ 'success': hover, 'd-none' : !hover }"
                            x-small
                          >Primary</v-btn>
                          <v-btn v-if="!phone.attributes.primary"
                            rounded
                            class="text-capitalize white--text"
                            :class="{ 'blue': hover, 'd-none' : !hover }"
                            x-small
                            @click="switchPrimaryPhone(phone)"
                          >Make Primary</v-btn>
                        </v-list-item-subtitle> 

                      </v-col>
                    </v-row>
                  </v-hover>
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
  </v-container>
</template>

<script>

import Auth from '../models/Auth';
import Password from '../models/Password';
import ResetPasswordService from '../services/ResetPasswordService';

export default {
  name: 'Profile',
  data() {
    return {
      user : new Auth(),
      password : new Password(),
      showProfile : true,
      showEmail : true,
      showPhone : true,
      showPassword : true,
      error : '',
      successMessage : '',
      successMessageDialog : false,
      redirectToLoginTimer : 3, 
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
    
    /**
     * Password last update
     */
    passwordCreationDate() {
      return this.$store.state.profile.password.attributes.difference
    }
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
      this.$refs.passwordObserver.validate().then(
        isValid => {
          if(isValid === true) {
            ResetPasswordService.profileChangePassword(this.password).then(
              (response) => {
                let status = response.status
                switch(status) {
                  case 200 :

                    /**
                     * Handle wrong previous password error
                     */
                    if(response.data.error !== undefined && response.data.error.status === 401) {
                      let message = { 0 : [response.data.error.detail ] }
                      this.error = message
                    }                    
                    break;
                  case 201 :
                    
                    /**
                     * Password changed successfully
                     * 
                     * Logout the user
                     */
                      this.error = null,
                      this.successMessage = response.data.attributes.message

                      this.successMessageDialog = true
                      setInterval(() => {
                        this.redirectToLoginTimer--
                      }, 3000)
                      // logout user after one second
                      setTimeout(() => { 
                        this.handleLogout()
                      }, 10000);
                    break;
                  default :
                    console.log(response)
                }
            },
            (error)=>{
             if(error.response.status === 422) {
               this.error = error.response.data.errors
               console.log(this.error)
             }
            }
            )
          }
        }
      );
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

    /**
     * Format password change history
     */
    formatCreationDate(creationDate) {
      let date = creationDate
      let  year = date.y > 0 ? date.y + " Years " : null;
      let month = date.m > 0 ? date.m + " months " : null;
      let day = date.d > 0 ? date.d + " days " : null;
      let hour = date.h > 0 ? date.h + " hours " : null;
      let minutes = date.i >= 0 ? date.i + " minutes " : null;
      let seconds = date.s >= 0 ? date.s + " seconds " : null;

      let lastDate = (year ?? ' ') + (month ?? ' ' ) + ( day ?? ' ' ) + ( hour ?? ' ' ) + ( minutes ?? ' ' ) + ( seconds ?? ' ' )

      return lastDate;
    },

    /**
     * Make email primary
     */
    switchPrimaryEmail(email) {
      let data = {
        'id' : email.id,
        'primary' : !email.attributes.primary,
        'email' : email.attributes.email
      }
      
      this.$store.dispatch('profile/switchPrimaryEmail', data).then(
        feedback => {
          console.log(feedback)
        }
      )
    },
    
    /**
     * Make phone primary
     */
    switchPrimaryPhone(phone) {
      var phoneData = {
        'id' : phone.id,
        'primary' : !phone.attributes.primary,
        'phone' : phone.attributes.phone,
      }
      

      this.$store.dispatch('profile/switchPrimaryPhone', phoneData).then(
        feedback => {
          console.log(feedback)
        }
      )
    },

    /**
     * Logout user
     */
    handleLogout() {
      this.$store.dispatch('auth/logout');
    }
  }
  
};
</script>
