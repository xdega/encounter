<template>

    <div>
        <multiselect
            v-model="shared.selected_client"
            :options="shared.select_clients"
            placeholder="Select Client..."
            label="name"
            track-by="name"
        >
        </multiselect>
    </div>

</template>

<script>

import Store from '../modules/store';
import Multiselect from 'vue-multiselect'

export default {

    components: { Multiselect },
    
    data() {

        return {
            shared: Store.state,
            selectedClient: { id:'', name:'' }
        };
    },

    mounted() {

        //

    },

    methods: {

        fullName ({ first_name, last_name }) {

            return `${first_name} ${last_name}`

        }

    }
}
        
</script>

<style>

    .multiselect input[type="text"] {
        border-bottom: none !important;
    }

    .multiselect__tags {
        border-radius: 0px !important;
    }

    .multiselect__content {
        border-radius: 0px !important;
    }

    .multiselect__option--highlight, .multiselect__option--selected.multiselect__option--highlight {
        background-color: #4aa6d4 !important;
    }

    .multiselect__tag-icon:focus,
    .multiselect__tag-icon:hover {
        background: #4aa6d4 !important;
    }

    .multiselect__option--highlight:after {
        background: #4aa6d4 !important;
    }

    .multiselect__option--selected.multiselect__option--highlight:after {
        background: #4aa6d4 !important;
    }





</style>

