<template>
    <!-- <validation-observer
        ref="observer"
        v-slot="{ invalid }"
    > -->
    <validation-observer
        ref="observer"
    >
        <v-row>
            <v-col 
                lg="6"
            >
                <validation-provider
                    v-slot="{ errors }"
                    name="user.firstname"
                    rules="required|max:15"
                >
                    <v-text-field
                        v-model="user.firstname"
                        :error-messages="errors"
                        :counter="15"
                        label="First Name"
                        required
                    ></v-text-field>
                </validation-provider>
            </v-col>
            <v-col 
                lg="6"
            >
                <validation-provider
                    v-slot="{ errors }"
                    name="user.lastname"
                    rules="required|max:15"
                >
                    <v-text-field
                        v-model="user.lastname"
                        :error-messages="errors"
                        :counter="15"
                        label="Last Name"
                        required
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>
        <validation-provider
            v-slot="{ errors }"
            name="user.lastname"
            rules="required"
        >
            <v-text-field
                v-model="user.email"
                :error-messages="errors"
                label="E-mail"
                required
            ></v-text-field>
        </validation-provider>
        <validation-provider
            v-slot="{ errors }"
            name="Phone number"
            rules="required|digits:10|regex"
            
        >
            <v-text-field
                v-model="user.phoneNumber"
                :error-messages="errors"
                label="Phone Number"
            ></v-text-field>
        </validation-provider>
        <validation-provider
            v-slot="{ errors }"
            name="user.gender"
            rules="required"
        >
            <v-select
                v-model="user.gender"
                :items="selectGender"
                :error-messages="errors"
                label="Gender"
                required
                @change="$v.select.$touch()"
                @blur="$v.select.$touch()"
            ></v-select>
        </validation-provider>
        <v-row>
            <v-col>
                <validation-provider
                    v-slot="{ errors }"
                    name="user.identification"
                    rules="required"
                >
                    <v-select
                        v-model="user.identification"
                        :items="selectIdentity"
                        :error-messages="errors"
                        label="Identitification document"
                        required
                        @change="$v.select.$touch()"
                        @blur="$v.select.$touch()"
                    ></v-select>
                </validation-provider>
            </v-col>
            <v-col>
                <validation-provider
                    v-slot="{ errors }"
                    name="user.idNumber"
                    rules="required"
                >
                    <v-text-field
                        v-model="user.idNumber"
                        :error-messages="errors"
                        label="Identification Number"
                        required
                        @input="$v.email.$touch()"
                        @blur="$v.email.$touch()"
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>
        <v-row>
            <v-col
                cols="12"
                lg="12"
            >
                <v-menu
                v-model="menu1"
                :close-on-content-click="false"
                max-width="290"
                >
                <template v-slot:activator="{ on, attrs }">
                    <validation-provider
                        v-slot="{ errors }"
                        name="user.idNumber"
                        rules="required"
                    >
                        <v-text-field
                            :value="computedDateFormattedMomentjs"
                            :error-messages="errors"
                            clearable
                            label="Date of Birth"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            @click:clear="date = null"
                        ></v-text-field>
                    </validation-provider>
                </template>
                <v-date-picker
                    v-model="user.dob"
                    @change="menu1 = false"
                ></v-date-picker>
                </v-menu>
            </v-col>
        </v-row>
    </validation-observer>
</template>
<script>
import UserRegistrationModel from '../models/UserRegistrationModel';
import moment from 'moment'
import { format, parseISO } from 'date-fns'

export default {
    components: {
        
    },
    name : 'UserRegistration',
    data () {
        return {
            user : new UserRegistrationModel('','','','','','','',''),
            selectGender : ['male', 'female'],
            selectIdentity : ['National ID', 'Passport', 'Driving Licence'],
            date: format(parseISO(new Date().toISOString()), 'yyyy-MM-dd'),
            menu1: false,
            menu2: false,
        }
    },
    computed: {
      computedDateFormattedMomentjs () {
        return this.date ? moment(this.date).format('dddd, MMMM Do YYYY') : ''
      },
      computedDateFormattedDatefns () {
        return this.date ? format(this.date, 'EEEE, MMMM do yyyy') : ''
      },
    },
    methods: {
        userData() {
            return this.user;
        },
        clear() {
            this.user = null,
            this.$refs.observer.reset()
        }
    }
}
</script>