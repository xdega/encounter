<template>

<!-- Create Client Panel -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Client</div>

            <div class="panel-body">

                <form v-on:submit.prevent="onSubmit" class="form-horizontal" role="form" method="POST">

                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name" class="col-md-4 control-label">First Name</label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newClient.first_name" 
                                id="first_name" 
                                type="text" 
                                class="form-control" 
                                name="first_name" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('first_name')"></strong>
                            </span>

                        </div>
                    </div>
                    <!-- /First Name -->

                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="last_name" class="col-md-4 control-label">Last Name</label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newClient.last_name" 
                                id="last_name" 
                                type="text" 
                                class="form-control" 
                                name="last_name" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('last_name')"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Last Name -->

                    <!-- Age -->
                    <div class="form-group">
                        <label for="age" class="col-md-4 control-label">Age (Optional)</label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newClient.age" 
                                id="age" 
                                type="text" 
                                class="form-control" 
                                name="age" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('age')"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Age -->

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone" class="col-md-4 control-label">Phone Number (optional)</label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newClient.phone" 
                                id="phone" 
                                type="text" 
                                class="form-control" 
                                name="phone" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('phone')"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Phone -->

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Email (optional) </label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newClient.email" 
                                id="email" 
                                type="text" 
                                class="form-control" 
                                name="email" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('email')"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Email -->

                    <!-- Portrait URL -->
                    <div class="form-group">
                        <label for="portrait_url" class="col-md-4 control-label">Portrait URL (optional) </label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newClient.portrait_url" 
                                id="portrait_url" 
                                type="text" 
                                class="form-control" 
                                name="portrait_url" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('portrait_url')"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Portrait URL -->

                    <!-- Comment -->
                    <div class="form-group">
                        <label for="comment" class="col-md-4 control-label">Comment (optional)</label>

                        <div class="col-md-6">

                            <textarea
                                rows="5"
                                v-on:keydown="onKeydown" 
                                v-model="newClient.comment" 
                                id="comment" 
                                type="textarea" 
                                class="form-control" 
                                name="comment" 
                                value=""
                                autocomplete="off"
                            >
                            </textarea>

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('comment')"></strong>
                            </span>

                            <span v-show="message" class="help-block form-message">
                                <strong v-text="message"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Comment -->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Create Client
                            </button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div> <!-- /Panel -->

</template>

<script>
    import {Errors} from '../../classes/Errors';
    import Store from '../../modules/store';

    export default {

        data() {

            return {
                newClient: {
                    clients_id: '',
                    first_name: '',
                    last_name: '',
                    age: '',
                    phone: '',
                    email: '',
                    portrait_url: '',
                    comment: ''
                },
                clients: [],
                errors: new Errors(),
                message: '',
                shared: Store.state
                //shared.clients[], shared.encounter_types[], shared.action_types[]

            };
        },

        mounted() {
            this.getClients();
        },

        methods: {

            onSubmit: function(){

                    // User Input
                    var client = this.newClient;

                    // Clear Form Input
                    this.newClient = { clients_id: '', first_name: '', last_name: '', age: '', phone: '', email: '', portrait_url: '', comment: '' }

                    // Send Post Request
                    axios.post('/api/clients', client)
                        .then( response => this.onSuccess() )
                        .catch( error => this.errors.record(error.response.data) );

            },

            onSuccess: function(){

                this.message = 'New Client Created!';
                this.getClients();
            
            },

            onKeydown: function() {
                this.message = '';

                //TODO: Refactor this mess!
                this.errors.clear('first_name');
                this.errors.clear('last_name');
                this.errors.clear('age');
                this.errors.clear('phone');
                this.errors.clear('email');
                this.errors.clear('portrait_url');
                this.errors.clear('comment');

            },

            getClients: function(){

                axios.get('/api/clients')
                    .then(response => this.shared.clients = response.data );

            }
        }
    }
        
</script>

<style scoped>

    .form-error {
        color: #f56666;
    }

    .form-message {
        color:#1fc78f;
    }

</style>