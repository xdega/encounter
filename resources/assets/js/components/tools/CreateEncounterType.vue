<template>

<!-- Create Client Panel -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Encounter Type</div>

            <div class="panel-body">

                <form v-on:submit.prevent="onSubmit" class="form-horizontal" role="form" method="POST">

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Encounter Type</label>

                        <div class="col-md-6">

                            <input 
                                v-on:keydown="onKeydown" 
                                v-model="newType.name" 
                                id="name" 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                value=""
                                autocomplete="off"
                            >

                            <span v-show="errors" class="help-block form-error">
                                <strong v-text="errors.get('name')"></strong>
                            </span>
                            <span v-show="message" class="help-block form-message">
                                <strong v-text="message"></strong>
                            </span>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Create Encounter Type
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
                newType: {
                    types_id: '',
                    name: ''
                },
                types: [],
                errors: new Errors(),
                message: '',
                shared: Store.state
                //shared.clients[], shared.encounter_types[], shared.action_types[]

            };
        },

        mounted() {
            this.getActions();
        },

        methods: {

            onSubmit: function(){

                    // User Input
                    var type = this.newType;

                    // Clear Form Input
                    this.newType = { id: '', name:'' }

                    // Send Post Request
                    axios.post('/api/types', type)
                        .then( response => this.onSuccess() )
                        .catch( error => this.errors.record(error.response.data) );

            },

            onSuccess: function(){

                this.message = 'New Encounter Type Created!';
                this.getActions();
            
            },

            onKeydown: function() {
                this.message = '';
                this.errors.clear('name');

            },

            getActions: function(){

                axios.get('/api/types')
                    .then(response => this.shared.encounter_types = response.data );

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