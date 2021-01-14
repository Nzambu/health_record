<template>
    <v-container 
        class="blue"
        fluid
        fill-height
    >
        <v-row>
            <v-col 
                offset-lg="4"
                lg="4"
            >
                <v-card>
                    <v-card-text class="pt-10">
                        <h1 class="text-center primary--text">Authentication</h1>
                    </v-card-text>
                    <div class="pt-15">
                        <v-snackbar
                            color="red"
                            top
                            v-model="snackbar"
                            timeout="-1"
                            tag="div"
                        >
                            <v-list-item two-line 
                                v-for="(error, index) in errors"
                                :key="index"
                            >
                                <v-list-item-content>
                                    <v-list-item-title v-text="error[0]"></v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        <template v-slot:action="{ attrs }">
                            <v-btn
                            color="red"
                            text
                            v-bind="attrs"
                            @click="snackbar = false"
                            >
                                <v-icon class="white--text">mdi-close</v-icon>
                            </v-btn>
                        </template>
                    </v-snackbar>
                    </div>
                    <v-row class="px-10 pb-5">
                        <v-col lg="12">
                            <validation-observer
                                ref="loginObserver"
                            >
                                <v-form 
                                    v-if="showLogin"
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
                                            required
                                        ></v-text-field>
                                    </validation-provider>
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Password"
                                        rules="required"
                                    >
                                        <v-text-field
                                            v-model="user.password"
                                            :error-messages="errors"
                                            label="Password"
                                            type="password"
                                            required
                                        ></v-text-field>
                                    </validation-provider>
                                    <v-row class="pt-5">
                                        <v-col lg="12">
                                            <v-btn block                                                
                                                class="success text-capitalize"
                                                @click="handleLogin"
                                            >Login</v-btn>
                                        </v-col>
                                    </v-row>
                                    <v-row 
                                        class="py-5"
                                    >
                                        <v-col 
                                            lg="6"
                                            class="pt-0"
                                        >
                                            <p class="text-left py-0 pl-0" @click="handleForgotPassword"><small>Forgot password? <span class="primary--text">Click here</span></small></p>
                                        </v-col> 
                                        <v-col 
                                            lg="6"
                                            class="pt-0"
                                        >
                                            <p class="text-right py-0 pl-0" @click="handleRegister"><small><span class="primary--text">Register</span></small></p>
                                        </v-col> 
                                    </v-row>
                                </v-form>
                            </validation-observer>
                            <v-form v-if="showRegister">
                                <validation-observer
                                    ref="registerObserver"
                                >
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="First Name"
                                        rules="required"
                                    >
                                        <v-text-field
                                            v-model="user.firstName"
                                            :error-messages="errors"
                                            label="First Name"
                                            required
                                        ></v-text-field>
                                    </validation-provider>
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Last Name"
                                        rules="required"
                                    >
                                        <v-text-field
                                            v-model="user.lastName"
                                            :error-messages="errors"
                                            label="Last Name"
                                            required
                                        ></v-text-field>
                                    </validation-provider>
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Email"
                                        rules="required"
                                    >
                                        <v-text-field
                                            v-model="user.email"
                                            :error-messages="errors"
                                            label="Email"
                                            required
                                        ></v-text-field>
                                    </validation-provider>
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Password"
                                        rules="required"
                                    >
                                        <v-text-field
                                            v-model="user.password"
                                            :error-messages="errors"
                                            label="Password"
                                            required
                                        ></v-text-field>
                                    </validation-provider>
                                    <v-row class="pt-5">
                                        <v-col lg="6">
                                            <v-btn block
                                                class="grey text-capitalize"
                                                @click="handleCancelShow"
                                            >Cancel</v-btn>
                                        </v-col>
                                        <v-col lg="6">
                                            <v-btn block
                                                class="success text-capitalize"
                                                @click="handleRegistration"
                                            >Register</v-btn>
                                        </v-col>
                                    </v-row>
                                </validation-observer>
                            </v-form>
                            <v-form v-if="showForgotPassword">
                                    <validation-observer
                                        ref="forgotPasswordObserver"
                                        lazy-validation
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
                                                required
                                            ></v-text-field>
                                        </validation-provider>                                        
                                        <v-row class="pt-5">
                                            <v-col lg="6">
                                            <v-btn block
                                                class="grey text-capitalize"
                                                @click="handleCancelShow"
                                            >Cancel</v-btn>
                                        </v-col>
                                            <v-col lg="6">
                                                <v-btn block
                                                    class="success text-capitalize"
                                                    @click="handleResetPassword"
                                                >Send Reset Email</v-btn>
                                            </v-col>
                                        </v-row>
                                    </validation-observer>
                                </v-form>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import Auth from '../models/Auth';
import Axios from '../services/Axios';
import ForgotPasswordService from '../services/ForgotPasswordService';
export default {
    name : 'Login',    
    data() {
        return {
            user : new Auth('', '', '', ''),
            showLogin : true,
            showForgotPassword : false,
            showRegister : false,
            snackbar : false,
            vertical : true,
            errors : '',
        }
    },
    methods : {        
        /**
         * Default show
         */
        handleCancelShow() {
            this.showLogin = true;
            this.showRegister = false;
            this.showForgotPassword = false;
        },

        /**
         * Show forgot password form
         */
        handleForgotPassword() {
            this.showLogin = !this.showLogin;
            this.showForgotPassword = !this.showForgotPassword
        },

        /**
         * Show registeration form
         */
        handleRegister() {
            this.showLogin = !this.showLogin;
            this.showRegister = !this.showRegister
        },

        /**
         * Authenticate user
         */
        async handleLogin() {
            const invalid = await this.$refs.loginObserver.validate();
            if(invalid) {
                // console.log("kuku dance")
            }  
            

            this.$store.dispatch('auth/login', this.user)
            .then(
                (response) => {
                let data = response

                /**
                 * Successfully logged in
                 */
                if(response.data) {
                    let tokenBearer = response.data
                    let token = tokenBearer.attributes.access_token
                    if(token) {
                        // Store token in session storage
                        sessionStorage.setItem('token', JSON.stringify(token));
                        // Set the authorization bearer token
                        Axios.defaults.headers.common.Authorization = 'Bearer '+ token
                        // Redirect to the requested link or profile
                        let path = this.$route.query.from
                        if(path === '/') {
                            this.$router.push('/patient')
                        } else {
                            this.$router.push(path || '/patient')
                        }
                    } 
                } else {

                    /**
                     * User does not exist or its invalid
                     */
                    if(response.response.data.errors) {
                        let error = data.response.data.errors
                        return this.handleErrorsFromAPI(error)
                    }
                    
                    /**
                     * Password is wrong
                     */
                    if(response.response.data.error.code) {
                        let message = data.response.data.error.detail                    
                        let error =  []
                        error.push([message])
                        return this.handleErrorsFromAPI(error)
                    }
                }
                },
                (failed) => {
                    let message = failed.messages                  
                    let error =  []
                    error.push([message])
                    return this.handleErrorsFromAPI(error)
                }
            )
        },

        /**
         * Register new user
         */
        async handleRegistration() {
            await this.$refs.registerObserver.validate().then(
                passValidation => {
                    if(passValidation === true)
                    {
                        console.log(passValidation)
                    }
                }
            );
        },

        /**
         * Send reset password email
         */
        handleResetPassword() {
            this.$refs.forgotPasswordObserver.validate().then(
                success => {
                    if(success === true)
                    {
                        // this.$store.dispatch('auth/sendResetPasswordEmail', this.user)
                        return ForgotPasswordService.sendResetPasswordEmail(this.user)
                        .then(
                            feedback => {
                                let status = feedback.status
                                if(status === 200)
                                {
                                    console.log(feedback)
                                }
                                if(status === 422) {
                                    let errors = feedback.data.errors
                                    return this.handleErrorsFromAPI(errors)
                                }
                            }
                        )
                    }
                }
            );
        },

        /**
         * Render errors from the API
         */
        handleErrorsFromAPI(error)
        {
            this.errors = error
            this.snackbar = true
        }
    }
}
</script>