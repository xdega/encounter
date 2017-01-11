<template>
<span>
    <div class="row">
        
        <form v-on:submit.prevent="" class="form-horizontal text-center" role="form">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="name" class="control-label">Client Name</label>
                </div>
            </div>
            
            <div class="col-md-6">

                <input 
                    v-on:click="getClients"
                    v-on:keyup="autocompleteVisible = true"
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
                    <ul class="autocomplete-result text-left">

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

        </div><!-- /Row -->


        <!-- Submit Button: Display Modal w/ Client Info -->
        <div class="col-md-6 col-md-offset-4 submit-button-responsive-center">
            <button type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#client-profile">
                View Client Profile
            </button>
        </div>


    </form>
    </div><!-- /Row -->
    
    <div class="row">
        <div id="client-profile" class="col-md-12 collapse">
        <hr>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img class="portrait" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Portrait&w=200&h=200">
                </div>

                    <div class="col-md-8">
                       <h2>Basic Information</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /Row -->

                    <div class="row">
                        <div class="col-md-8 col-md-offset-4">
                            <h2>Comments</h2>
                            <p>Comments...</p>
                        </div>
                    </div><!-- /Row -->

                    <div class="row">
                        <div class="col-md-8 col-md-offset-4">
                            <h2>Recent Encounters</h2>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Duration (Minutes)</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1/7/2017</td>
                                        <td>30</td>
                                        <td>Was found without socks and shoes.</td>
                                        <td>Gave Clothing</td>
                                    </tr>
                                    <tr>
                                        <td>1/3/2017</td>
                                        <td>20</td>
                                        <td>...</td>
                                        <td>Gave Food</td>
                                    </tr>
                                    <tr>
                                        <td>1/1/2017</td>
                                        <td>40</td>
                                        <td>...</td>
                                        <td>None</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

    </div><!-- /Row -->

</span>
</template>

<script>
    export default {

        data() {

            return {
                query: '',
                value: '',
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
            //
        },

        methods: {

            //Update Query Value
            updateQuery: function(item){
                this.query = item;
                this.clearClients();
            },

            //Get Clients
            getClients: function(){
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

    .portrait {
        border-radius: 100px;
    }

    @media(max-width: 767px){
        .submit-button-responsive-center {
            text-align: center;
        }
    }

    #name {
        margin-bottom: 2px;
    }

</style>