<template>
    <span>
        
        <input 
            v-on:click="getClients" 
            v-on:blur="clearClients"
            v-model="query"   
            id="name" 
            type="text" 
            class="form-control" 
            name="name" 
            :value="query"
            autocomplete="off"
        >

        <div v-if="visible">
            
            <ul class="autocomplete-result">

                <li 
                    v-bind:key="computedClients.indexOf(item)"
                    v-for="client in computedClients" 
                >
                    {{client.name}}
                </li>

            </ul>

        </div>

    </span>
</template>

<script>
    export default {

        data() {

            return {
                query: '',
                value: '',
                visible: false,
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

            //Get Clients
            getClients: function(){
                this.visible = true;
                axios.get('/api/clients')
                    .then(response => {
                        this.clients = response.data;
                    });
            },

            //Clear Clients
            clearClients: function(){
                this.clients = [];
                this.visible = false;
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