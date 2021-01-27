<template>
    <v-container>
        <v-card>
            <v-card-title class="px-10 py-0">
                <v-row>
                    <v-col 
                        lg="3" 
                        md="3"
                        sm="0"
                        class="d-none d-md-flex"
                    >
                        <v-list-item two-line>
                            <v-list-item-content>
                                <v-list-item-title class="grey--text">Patient Health Records</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-col>
                    <v-col
                        xl="7" 
                        lg="7"
                        md="7"
                        sm="9"
                        xs="12"
                    >
                        <v-text-field
                            v-model="searchPatient"
                            label="Search"
                            single-line
                            hide-details
                        >
                            <v-icon
                                slot="append"
                                color="blue"
                            >
                            mdi-magnify
                            </v-icon>
                        </v-text-field>
                    </v-col>
                    <v-col 
                        xl="2"
                        lg="2" 
                        md="2"
                        sm="3"
                        class="text-right d-none d-sm-flex"
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
                        <v-dialog
                            v-model="showModal"
                            persistent
                            max-width="600px"
                        >
                            <v-card>
                                <v-card-title class="text-center">
                                    <v-list-item>
                                        <v-list-item-content class="pb-0">
                                            <v-list-item-title class="grey--text text-center">Patient Health Record</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
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

                                        <!-- Cancel add or edit patient -->

                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            class="default text-capitalize"
                                            @click="closeModal"
                                        >
                                        Close
                                        </v-btn>

                                        <!-- End -->

                                        <!-- Save new patient record -->

                                        <v-btn v-if="addPatient"
                                            class="success text-capitalize white--text"
                                            @click="handleSaveNewPatient"                                    
                                        >Save Patient</v-btn>

                                        <!-- End -->

                                        <!-- Save changes on patient record -->

                                        <v-btn v-if="editPatient"
                                            class="blue text-capitalize white--text"
                                            @click="handleEditPatient"                                    
                                        >Save Changes</v-btn>

                                        <!-- End -->
                                    </v-row>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        
                        <!-- End of Dialog/Modal -->
                        
                        <v-dialog
                            v-model="showDeleteModal"
                            persistent
                            max-width="400px"
                        >
                        <!-- <v-dialog
                            v-model="showDeleteModal"
                            persistent
                            max-width="600px"
                        > -->
                            <v-card>
                                <v-card-title class="text-center">
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-list-item-title class="grey--text">Delete Health Record</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-card-title>
                                <v-card-text>
                                    <v-container class="text-center"> 
                                        <v-list-item>
                                            <v-list-item-content>
                                                <v-list-item-title class="grey-text">{{ this.deletePatientData.name }}</v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>
                                        <v-avatar
                                            size="100"
                                        >
                                            <v-icon 
                                                class="red--text"
                                                x-large
                                            >mdi-delete-forever</v-icon>
                                        </v-avatar>
                                        <v-list-item two-line>
                                            <v-list-item-content>
                                                <v-list-item-title class="py-2">Are you sure?</v-list-item-title>                                            
                                                <v-list-item-subtitle class="grey--text">Do you really want to delete the record? <br/>Will delete record permanently!</v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions class="px-10 pb-5">
                                    <v-row>
                                        <!-- <v-spacer></v-spacer>    -->

                                        <!-- Cancel add or edit patient -->

                                        <v-btn
                                            color="grey darken-1"
                                            class="white--text text-capitalize"
                                            @click="closeDeletePatientModal()"
                                        >
                                        Cancel
                                        </v-btn>

                                        <!-- End -->

                                        <v-spacer></v-spacer>

                                        <!-- Save changes on patient record -->

                                        <v-btn
                                            class="red text-capitalize white--text"   
                                            @click="handleDeletePatient()"                  
                                        >Delete</v-btn>

                                        <!-- End -->
                                    </v-row>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>



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
                        :loading="dataTableLoading"
                    >
                        <template v-slot:[`item.relationships.gender[0].attributes.sex`]="{ item }">
                            <v-chip
                                small
                                :color="getColor(item.relationships.gender[0].attributes.sex)"
                                dark
                            >
                                {{ item.relationships.gender[0].attributes.sex }}
                            </v-chip>
                        </template>
                        <template v-slot:[`item.delete`]="{ item }">                            
                            <v-icon
                                medium
                                color="red"
                                @click="showDeletePatientModal(item)"
                                class="ml-2 text-center"
                            >
                                mdi-delete-circle
                            </v-icon>
                        </template>
                        <template v-slot:[`item.edit`]="{ item }">   
                            <v-icon
                                medium
                                color="blue"
                                class="mr-2 text-center"
                                @click="showEditPatient(item)"
                            >
                                mdi-pencil-circle
                            </v-icon>
                        </template>
                    </v-data-table>
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
            editPatient : false,
            showModal : false,
            showDeleteModal : false,
            deletePatientData : '',
            dataTableLoading : true,
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
                {
                    text : 'Delete',
                    value : 'delete',
                    sortable : false
                },
                {
                    text : 'Edit',
                    value : 'edit',
                    sortable : false
                }
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
            this.addPatient = !this.addPatient   
            this.setPatientDataToNull();
            this.toggleShowModal()         
        },

        /**
         * Toggle edit patient
         */
        toggleEditPatient() {
            this.editPatient = !this.editPatient
            this.toggleShowModal() 
        },

        /**
         * Close modal
         */
        closeModal() {
            this.editPatient = false
            this.addPatient = false
            this.toggleShowModal()
        },

        /**
         * Toggle show modal
         */
        toggleShowModal() {
            this.showModal = !this.showModal
        },

        /**
         * Set patient data to null
         */
        setPatientDataToNull() {
            this.patient.id = null
            this.patient.name = null
            this.date = moment()
            this.patient.gender_id = null
            this.patient.service_id = null
            this.patient.comments = null
        },

        /**
         * Save new patient
         */
        handleSaveNewPatient()
        {
            // Validate all the fields
            this.$refs.patientObserver.validate()
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
                        // Clear all data 
                        this.setPatientDataToNull()

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
                        this.dataTableLoading = !this.dataTableLoading;
                    }
                }
            )
        },

        /**
         * Handle edit a patient record
         */
        showEditPatient(patient) {

            /**
             * Set the patient data
             */
            this.patient.id = patient.id
            this.patient.name = patient.attributes.name
            this.patient.dob = patient.attributes.dob
            this.date = patient.attributes.dob
            this.patient.gender_id = patient.relationships.gender[0].id
            this.patient.service_id = patient.relationships.service[0].id
            this.patient.comments = patient.attributes.comments
            
            /**
             * Activate modal
             */
            this.toggleEditPatient();
        },

        /**
         * Handle edit patient
         */
        handleEditPatient() {
            this.$refs.patientObserver.validate().then(
                isValid => {
                    if(isValid === true) {
                        // set patient date of birth
                        this.patient.dob = this.date;
                        this.$store.dispatch('patient/updatePatient', this.patient).then(
                            feedback => {
                                let status = feedback.status
                                switch(status) {
                                    case 200 :
                                        this.closeModal()
                                        break;
                                    default :
                                        console.log(feedback)
                                }
                            },
                            failed => {
                                console.log(failed.response)
                            }
                        )
                    }
                }
            );
        },

        showDeletePatientModal(patient) {
            if(patient) { 
                this.deletePatientData = { 
                    id : patient.id,
                    name : patient.attributes.name
                }
                this.showDeleteModal = !this.showDeleteModal
            }
        },
        
        closeDeletePatientModal() {
            // clear deleted patient data
            this.deletePatientData = []

            // Hide the modal
            this.showDeleteModal = !this.showDeleteModal
        },

        /**
         * Handle delete a patient record
         */
        handleDeletePatient() {
            let patient = this.deletePatientData
            this.$store.dispatch('patient/deletePatient', patient.id).then(
                feedback => {
                    let status = feedback.status
                    switch(status) {
                        case 200 :
                            console.log(feedback)
                            this.closeDeletePatientModal()
                            break;
                        default :
                            console.log(feedback);
                    }
                },
                error => {
                    console.log(error)
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
        },

        /**
         * Get gender color
         */
        getColor(gender) { 
            if(gender === 'Male') {
                return "blue"
            } else {
                return "pink"
            }
        },
    }
}
</script>