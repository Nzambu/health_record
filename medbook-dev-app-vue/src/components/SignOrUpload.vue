<template>
    <div>
        <v-card>
        <VueSignaturePad height="100px" ref="signaturePad" background-color="red"/>
        </v-card>
        <div class="mt-10">
            <v-file-input
                v-model="files"
                placeholder="Please choose your signature image"
                label="Upload signature"
                multiple
                prepend-icon="mdi-paperclip"
            >
            <template v-slot:selection="{ text }">
                <v-chip
                    small
                    label
                    color="primary"
                >
                    {{ text }}
                </v-chip>
                </template>
            </v-file-input>
        </div>
        <div class="mt-3">
            <v-btn @click="undo" class="mr-3">Undo</v-btn>
            <v-btn @click="save" color="success">Save</v-btn>
        </div>
    </div>
</template>
<script>
export default {
    name : 'SignOrUpload',
    methods : {
        undo() {
        this.$refs.signaturePad.undoSignature();
        },
        save() {
            console.log("this is save signature")
            // return
            const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
            console.log(isEmpty);
            console.log(data);
        },
        mounted() {
            this.undo()
            this.save()
        }
    }
}
</script>