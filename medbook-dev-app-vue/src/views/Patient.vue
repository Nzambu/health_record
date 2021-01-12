<template>
    <v-container>
        <v-card>
            <v-card-title class="px-10 py-0">
                <v-row>
                <v-col lg="6">
                <v-list-item one-line>
                    <v-list-item-content>
                        <v-list-item-title>Patient Health Records</v-list-item-title>
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
                        @click="toggleAddPatient"
                        v-bind="attrs"
                        v-on="on"
                        >Patient
                        <v-icon v-if="showPatients"
                            class="white--text"                
                        >mdi-plus</v-icon>
                        <v-icon v-if="!showPatients"
                            class="white--text"                
                        >mdi-close</v-icon>
                        </v-btn>
                    </template>
                    <span>Add Patient</span>
                    </v-tooltip> 
                    </v-row>            
                </v-col>
                </v-row>
            </v-card-title>
        <v-divider></v-divider>
        <v-row class="py-10 px-10">
            <v-col v-if="showPatients">
                <v-data-table
                    :headers="tableHeaders"
                    :items="patientList"
                    :items-per-page="10"
                    class="elevation-1"
                ></v-data-table>
            </v-col>
            <v-col v-if="!showPatients"
                offset-lg="3"
                lg="6"
                offset-md="3"
                md="6"
            >
            <v-form
                lazy-validation
            >
              <validation-observer
                  ref="patientObserver"
              >
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
                <validation-provider
                    v-slot="{errors}"
                    name="Date of Birth"
                    rules="required"
                >
                  <v-text-field
                      v-model="patient.dob"
                      :error-messages="errors"
                      label="Date of Birth"
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
                        v-model="patient.dob"
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
                    :items="['Female', 'Male']"
                    label="Gender"
                    persistent-hint
                    return-object
                    single-line
                  ></v-select>
                </validation-provider>
                <validation-provider
                  v-slot="{errors}"
                  name="Type Of Service"
                  rules="required"
                >
                  <v-select
                    v-model="patient.gender_id"
                    :error-messages="errors"
                    :items="['Outpatient', 'Inpatient']"
                    label="Type of Service"
                    persistent-hint
                    return-object
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
                        ></v-textarea>
                </validation-provider>
                <v-row class="pt-5">
                  <v-col lg="12">
                    <v-btn block
              
                      class="success text-capitalize"
                      @click="handleSaveNewPatient"
                    >Save Patient</v-btn>
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

import Patient from '../models/Patient';
import moment from 'moment'
import { format, parseISO } from 'date-fns'

export default {
    name : 'Patient',
    data() {
        return {
            patient : new Patient(),
            showPatients : true,
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
            date: format(parseISO(new Date().toISOString()), 'yyyy-MM-dd'),
            menu1: false,
            menu2: false,
        }    
    },
    computed : {
        patientList() {
            return this.$store.state.patient.list ?? null
        },

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
        });
    },
    methods : {
        /**
         * Toggle show and add patients
         */
        toggleAddPatient()
        {
            this.showPatients = !this.showPatients
        },

        /**
         * Save new patient
         */
        async handleSaveNewPatient()
        {
            console.log(this.patient)
            // await this.$refs.patientObserver.validate();
            // this.$store.dispatch('patient/savePatient', this.patient).then(
            //     response => {
            //         let data = response
            //         console.log(data)
            //     }
            // )
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
                        return records
                    }
                }
            )
        }
    }
}
</script>