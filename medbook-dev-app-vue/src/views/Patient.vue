<template>
    <v-container>
        <v-card>
            <v-card-title class="px-10 py-0">
                <v-row>
                    <v-col lg="3">
                        <v-list-item two-line>
                            <v-list-item-content>
                                <v-list-item-title>Patient Health Records</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-col>
                    <v-col lg="7">
                        <v-text-field
                            v-model="searchPatient"
                            append-icon="mdi-magnify"
                            label="Search"
                            single-line
                            hide-details
                        ></v-text-field>
                    </v-col>
                    <v-col lg="2" class="text-right">
                        <v-dialog
                            v-model="addPatient"
                            persistent
                            max-width="600px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <div 
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                <v-tooltip 
                                    bottom            
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn
                                            class="blue white--text text-capitalize"
                                            @click="toggleAddPatient"
                                            v-bind="attrs"
                                            v-on="on"
                                        >Patient
                                            <v-icon
                                                class="white--text"                
                                            >mdi-plus</v-icon>
                                        </v-btn>
                                    </template>
                                    <span>Add Patient</span>
                                </v-tooltip>
                                </div>
                                </template>
                                <v-card>
                                <v-card-title class="text-center">
                                    <span class="headline">Patient Health Record</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <validation-observer
                                            ref="patientObserver"
                                        >
                                            <v-form>              
                                                <validation-provider
                                                v-slot="{errors}"
                                                name="Name"
                                                rules="required"
                                                >
                                                <v-text-field
                                                    v-model="patient.name"
                                                    :error-messages="errors"
                                                    label="Name"
                                                    type="text"
                                                    required
                                                ></v-text-field>
                                                </validation-provider>
                                                <v-menu
                                                    v-model="menu1"
                                                    :close-on-content-click="false"
                                                    max-width="290"
                                                >
                                                    <template v-slot:activator="{ on, attrs }">
                                                        <validation-provider
                                                            v-slot="{errors}"
                                                            name="Date of Birth"
                                                            rules="required"
                                                        >
                                                            <v-text-field
                                                                :value="computedDateFormattedMomentjs"
                                                                :error-messages="errors"
                                                                clearable
                                                                label="Date Of Birth"
                                                                readonly
                                                                v-bind="attrs"
                                                                v-on="on"
                                                                @click:clear="date = null"
                                                            ></v-text-field>
                                                        </validation-provider>
                                                    </template>
                                                    <v-date-picker
                                                        v-model="date"
                                                        @change="menu1 = false"
                                                    ></v-date-picker>
                                                </v-menu>
                                                <validation-provider
                                                v-slot="{errors}"
                                                name="Gender"
                                                rules="required"
                                                >
                                                <v-select
                                                    v-model="patient.gender_id"
                                                    :error-messages="errors"
                                                    :items="genderList"
                                                    item-text="attributes.sex"
                                                    item-value="id"
                                                    label="Gender"
                                                    persistent-hint                    
                                                    single-line
                                                ></v-select>
                                                </validation-provider>
                                                <validation-provider
                                                v-slot="{errors}"
                                                name="Type Of Service"
                                                rules="required"
                                                >
                                                <v-select
                                                    v-model="patient.service_id"
                                                    :error-messages="errors"
                                                    :items="serviceList"
                                                    item-text="attributes.service"
                                                    item-value="id"
                                                    label="Type of Service"
                                                    persistent-hint
                                                    single-line
                                                ></v-select>
                                                </validation-provider>
                                                <validation-provider
                                                v-slot="{errors}"
                                                name="General Comments"
                                                rules="required" 
                                                >
                                                    <v-textarea
                                                        v-model="patient.comments"
                                                        :error-messages="errors"
                                                        name="General Comments"
                                                        label="General Comments"
                                                        value=""
                                                        hint=""
                                                        counter="255"
                                                        ></v-textarea>
                                                </validation-provider>
                                                <!-- <v-row class="pt-5">
                                                    <v-col lg="12">
                                                        <v-btn 
                                                            block 
                                                            class="success text-capitalize"
                                                            @click="handleSaveNewPatient"                                    
                                                        >Save Patient</v-btn>
                                                    </v-col>
                                                </v-row>               -->
                                            </v-form>
                                        </validation-observer>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions class="px-10 pb-5">
                                    <v-row>
                                        <v-spacer></v-spacer>            
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            class="default text-capitalize"
                                            @click="toggleAddPatient"
                                        >
                                        Close
                                        </v-btn>
                                        <v-btn 
                                            class="success text-capitalize"
                                            @click="handleSaveNewPatient"                                    
                                        >Save Patient</v-btn>
                                    </v-row>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        
                        <!-- End of Dialog/Modal -->

                    </v-col>
                </v-row>
            </v-card-title>
            <v-divider></v-divider>
            <v-row class="py-10 px-10">
                <v-col>
                    <v-data-table
                        :headers="tableHeaders"
                        :items="patientList"
                        :search="searchPatient"
                        :items-per-page="10"
                        :page.sync="page"
                        class="elevation-1"
                        @page-count="pageCount = $event" 
                        height="600px"
                    ></v-data-table>
                    <!-- <v-pagination
                        v-model="page"
                        :length="pageCount"
                    ></v-pagination> -->
                </v-col>
            </v-row>
        </v-card>
    </v-container>
</template>
<script>

import Patient from '../models/Patient';
import moment from 'moment'
import { format, parseISO } from 'date-fns'

export default {
    name : 'Patient',
    data() {
        return {
            patient : new Patient(),
            showPatients : false,
            addPatient : false,
            searchPatient : '',
            patientList : [],
            tableHeaders : [
                {
                    text: 'Name',
                    align: 'start',
                    sortable: false,
                    value: 'attributes.name',
                },
                {
                    text: 'Date Of Birth',
                    align: 'left',
                    value: 'attributes.dob',
                },
                {
                    text: 'Gender',
                    align: 'left',
                    value: 'relationships.gender[0].attributes.sex',
                },
                {
                    text: 'Type Of Service',
                    align: 'left',
                    value: 'relationships.service[0].attributes.service',
                },
                {
                    text: 'General Comments',
                    align: 'left',
                    value: 'attributes.comments',
                },
            ],
            page : 1,
            pageCount : 0,
            date: format(parseISO(new Date().toISOString()), 'yyyy-MM-dd'),
            menu1: false,
            menu2: false,
        }    
    },
    computed : {
        /**
         * Service list
         */
        serviceList() {
            return this.$store.state.patient.service ?? null
        },

        /**
         * Gender List
         */
        genderList() {
            return this.$store.state.patient.gender ?? null
        },

        /**
         * Patient List
         */
        // patientList() {
            
        //     return this.$store.state.patient.list ?? null
        // },

        /**
         * Process the dates
         */
        computedDateFormattedMomentjs () {
            return this.date ? moment(this.date).format('dddd, MMMM Do YYYY') : ''
        },
        computedDateFormattedDatefns () {
            return this.date ? format(this.date, 'EEEE, MMMM do yyyy') : ''
        },
    },
    created() {
        this.$nextTick(() => {
            this.loadPatientList();
            this.loadGender();
            this.loadService();
        });
    },
    methods : {
        /**
         * Toggle show and add patients
         */
        toggleAddPatient()
        {
            // this.showPatients = !this.showPatients
            this.addPatient = false
        },

        /**
         * Save new patient
         */
        async handleSaveNewPatient()
        {
            // Validate all the fields
            await this.$refs.patientObserver.validate()
            .then(
                success => {
                    // validation returns true
                    if(success === true) {
                        // set patient date of birth
                        this.patient.dob = this.date;
                        // pass data to patient module
                        this.$store.dispatch('patient/savePatient', this.patient)
                        .then(
                            newRecord => {
                                let data = newRecord
                                console.log(data)
                            }
                        );
                        // close modal
                        this.toggleAddPatient()
                    }
                }
            );
            
        },

        /**
         * Load all patients
         */
        loadPatientList()
        {
            this.$store.dispatch('patient/getList').then(
                records => {
                    if(records)
                    {
                        /**
                         * Assign the list to a custom model - loads data without refreshing to get the data
                         */
                        this.patientList = this.$store.state.patient.list
                    }
                }
            )
        },

        /**
         * Load gender
         */
        loadGender()
        {
            this.$store.dispatch('patient/genderList')
        },

        /**
         * Load service
         */
        loadService()
        {
            this.$store.dispatch('patient/serviceList')
        },
        
        /**
         * Set patient gender
         */
        setGender(sex) 
        {
            this.patient.gender_id = sex.item
        },

        /**
         * Set patient service
         */
        setService(service)
        {
            this.patient.service_id = service.id
        }
    }
}
</script>