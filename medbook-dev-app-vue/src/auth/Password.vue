<template>
    <v-container 
        class="blue"
        fluid
        fill-height
    >
        <v-row>
            <v-col 
                offset-xl="4"
                xl="4"
                offset-lg="4"
                lg="4"  
                offset-md="3"
                md="6" 
                offset-sm="2"   
                sm="8" 
                xs="12"         
            >
                <v-card
                    class="mx-15 mx-xs-0"
                >
                    <v-card-text class="pt-10">
                        <h1 class="text-center primary--text">Change Password</h1>
                    </v-card-text>                    
                    <v-row class="px-10 pb-5">
                        <v-col lg="12">
                            <validation-observer
                                ref="changePasswordObserver"
                            >
                                <v-form 
                                    v-if="tokenIsValid"
                                >                                
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="New Password"
                                        rules="required"
                                    >
                                        <v-text-field
                                            v-model="change.password"
                                            :error-messages="errors"
                                            label="New Password"
                                            type="password"
                                            required
                                        ></v-text-field>
                                    </validation-provider>
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Confirm Password"
                                        rules="required"
                                    >
                                        <v-text-field
                                            v-model="change.password_confirmation"
                                            :error-messages="errors"
                                            label="Confirm Password"
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
                                </v-form>
                            </validation-observer>                            
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import Password from '../models/Password';
import ResetPasswordService from '../services/ResetPasswordService';

export default {
    name : 'Password',
    data () {
        return {
            change : new Password(),
            tokenIsValid : false,
        }
    },
    computed : {
      token() {
        return this.$route.query.token
      }, 
    },
    created () {
        console.log(this.token)
        this.$nextTick(() => {
            this.validateAndVerifyToken()
        })
    },
    methods : {

        /**
         * Validate and Verify the token
         */
        validateAndVerifyToken() 
        {
            if(this.token) {
                ResetPasswordService.verifyResetPasswordToken(this.token).then(
                    feedback => {
                        let status = feedback.status
                        console.log(feedback.data)
                        switch(status) {
                            case 200 :
                                this.tokenIsValid = true
                                break;
                            default :
                                console.log("there is a problem ", status)
                        }
                    },
                    error => {
                        console.log(error)
                    }
                )
            }
        },

        /**
         * Handle change password
         */
        handleChangePassword() {
            this.$refs.changePasswordObserver.validate().then(
                isValid => {
                    if(isValid === true) {
                        this.change.token = this.token
                        ResetPasswordService.changePassword(this.change).then(
                            feedback => {
                                let status = feedback.status
                                switch(status) {
                                    case 204 :
                                        console.log(feedback.data)
                                        break;
                                    default :
                                        console.log(feedback.data)
                                }
                            }
                        );
                    }
                }
            )
        }
    }
}
</script>