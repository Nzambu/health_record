<template>
    <v-select
        v-model="property"
        :items="items"
        label="Property"
        required
        @change="$v.select.$touch()"
        @blur="$v.select.$touch()"
    ></v-select>
</template>
<script>
export default {
    name : 'SelectProperty',
    data() {
        return {
            property : '',
            items : [ 'Test 1', 'Test 2', 'Test 3', 'Test 4','Test 5' ]
        }
    },
    methods : {
        propertyData() {
            return this.property
            // console.log("this has changed")
        }
    }
}
</script>