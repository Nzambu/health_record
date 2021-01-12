<template>
    <div>
        <v-card>
            <VueSignaturePad height="100px" ref="signaturePad" background-color="red"/>
        </v-card>
        <v-row class="mt-3">
            <v-spacer></v-spacer>
            <v-btn @click="undo" class="mr-3 text-capitalize">Clear</v-btn>
            <!-- <v-btn @click="save" color="success">Save</v-btn> -->
        </v-row>
    </div>
</template>
<script>
export default {
    name : 'Sign',
    methods : {
        undo() {
        this.$refs.signaturePad.undoSignature();
        },
        save() {
            const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
            return {isEmpty, data}
        },
        mounted() {
            this.undo()
            this.save()
        }
    }
}
</script>