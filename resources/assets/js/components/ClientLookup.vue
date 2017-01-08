<template>
<span>
    <form v-on:submit.prevent="onSubmit" class="form-horizontal" role="form">
        

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Client Name</label>
            
            <div class="col-md-6">

                <input 
                    v-on:click="getClients" 
                    v-model="query"
                    id="name" 
                    type="text" 
                    class="col-md-4 form-control" 
                    name="name" 
                    :placeholder="placeholder"
                    autocomplete="off"
                >

                <!-- Autocomplete Dropdown -->
                <div v-show="autocompleteVisible">
                    <ul class="autocomplete-result">

                        <li 
                            v-bind:key="computedClients.indexOf(item)"
                            v-for="client in computedClients" 
                            v-on:click="updateQuery(client.name)"
                        >
                            {{client.name}}
                        </li>

                    </ul>
                </div> <!-- /Autocomplete Dropdown -->

            </div>

        </div><!-- /Form Group -->


        <!-- Submit Button: Display Modal w/ Client Info -->
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" prevent>
                View Client Profile
            </button>
        </div>


    </form>

</span>
</template>

<script>
    export default {

        data() {

            return {
                query: '',
                value: '',
                modalVisible: false,
                autocompleteVisible: false,
                clients: []
            };
        },

        computed: {
            computedClients: function () {
                var self = this

                return this.clients.filter(function (item) {
                    return item.name.toLowerCase().indexOf(self.query.toLowerCase()) !== -1
                })
            }
        },

        mounted() {
            console.log('Autocomplete Input Mounted.');
        },

        methods: {

            //Update Query Value
            updateQuery: function(item){
                this.query = item;
                this.clearClients();
            },

            //Get Clients
            getClients: function(){
                this.autocompleteVisible = true;
                axios.get('/api/clients')
                    .then(response => {
                        this.clients = response.data;
                    });
            },

            //Clear Clients
            clearClients: function(){
                this.clients = [];
                this.autocompleteVisible = false;
            },

            //Set Value
            setValue: function (item){
                this.clearClients();
                this.value = item;
            }
        }
    }
        
</script>

<style scoped>

    .autocomplete-result {
        list-style: none;
        padding: 5px;
        border: 1px solid;
        margin-top: 2px;
        max-height: 78px;
        overflow: scroll;
    }

    .autocomplete-result li:hover {
        background-color: #f5f5f5;
    }

</style>