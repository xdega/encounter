<template>

<!-- Intake Form Panel -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Intake Form</div>

            <div class="panel-body">

                <form v-on:submit.prevent="onSubmit(shared.selected_client.id)" class="form-horizontal" role="form" method="POST">

                    <!-- Select Client -->
                    <div class="form-group">

                        <label for="client" class="col-md-4 control-label">Client</label>

                        <div class="col-md-6">

                            <client-autocomplete-input></client-autocomplete-input>
                         
                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('client')"></strong>
                            </span>

                        </div>
                    </div>
                    <!-- /Select Client -->

                    <!-- Date/Time -->
                    <div class="form-group">
                        <label for="date_time" class="col-md-4 control-label">Date/Time</label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newEncounter.date_time" 
                                id="date_time" 
                                type="datetime-local" 
                                class="form-control" 
                                name="date_time" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('date_time')"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Date/Time -->

                    <!-- Duration -->
                    <div class="form-group">
                        <label for="duration" class="col-md-4 control-label">Duration</label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newEncounter.duration" 
                                id="date_time" 
                                type="text" 
                                class="form-control" 
                                name="duration" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('duration')"></strong>
                            </span>


                        </div>
                    </div>
                    <!-- /Duration -->

                    <!-- Select Encounter Type -->
                    <div class="form-group">

                        <label for="encounter_type" class="col-md-4 control-label">Encounter Type</label>

                        <div class="col-md-6">
                            
                            <select v-model="newEncounter.types_id" class="form-control" name="encounter_type">
                                
                                <option v-for="option in shared.encounter_types" v-bind:value="option.types_id">
                                    {{ option.name }}
                                </option>

                            </select>
                         
                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('encounter_type')"></strong>
                            </span>

                        </div>
                    </div>
                    <!-- /Select Encounter Type -->

                    <!-- Select Action -->
                    <div class="form-group">

                        <label for="action" class="col-md-4 control-label">Action</label>

                        <div class="col-md-6">
                            
                            <select v-model="newEncounter.actions_id" class="form-control" name="action">
                                
                                <option v-for="option in shared.action_types" v-bind:value="option.actions_id">
                                    {{ option.name }}
                                </option>

                            </select>
                         
                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('action')"></strong>
                            </span>

                        </div>
                    </div>
                    <!-- /Select Encounter Type -->


                    <!-- Comment -->
                    <div class="form-group">
                        <label for="comment" class="col-md-4 control-label">Comment (optional)</label>

                        <div class="col-md-6">

                            <textarea
                                rows="5"
                                v-on:keydown="onKeydown" 
                                v-model="newEncounter.comment" 
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
                                Create Encounter
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
    import {Errors} from '../classes/Errors';
    import Store from '../modules/store';

    export default {

        data() {

            return {

                newEncounter: {
                    users_id: this.auth,
                    clients_id: '',
                    types_id: '',
                    actions_id: '',
                    date_time: '',
                    duration: '',
                    comment: ''
                },
                encounters: [],
                selectedClient: '',
                errors: new Errors(),
                message: '',
                shared: Store.state

            };
        },

        props: ['auth'],

        mounted() {

            this.getEncounters();

        },

        methods: {

            onSubmit: function(shared_id){

                    //Set Client ID, Based on Shared Value.
                    this.newEncounter.clients_id = shared_id;

                    // User Input
                    var encounter = this.newEncounter;

                    // Clear Form Input
                    this.newEncounter = {
                        users_id: this.auth, 
                        clients_id: '', 
                        types_id: '', 
                        actions_id: '',
                        date_time: '', 
                        duration: '', 
                        comment: '' 
                    };
                    
                    // Send Post Request
                   
                    axios.post('/api/encounters', encounter)
                        .then( response => this.onSuccess() )
                        .catch( error => this.errors.record(error.response.data) );

            },

            onSuccess: function(){

                this.message = 'New Encounter Created!';
                this.getEncounters();
            
            },

            onKeydown: function() {
                this.message = '';

                //TODO: Refactor this mess!
                //this.errors.clear('first_name');
                //this.errors.clear('last_name');
                //this.errors.clear('age');
                //this.errors.clear('phone');
                //this.errors.clear('email');
                //this.errors.clear('portrait_url');
                //this.errors.clear('comment');

            },

            getEncounters: function(){

                axios.get('/api/encounters')
                    .then(response => this.encounters = response.data );

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