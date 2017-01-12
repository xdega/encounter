@extends('layouts.app')

@section('content')
<div id="app" class="container">

    <!-- Tools Panel-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tools</div>

                    <div class="panel-body text-center">
                            <button class="btn btn-primary" data-toggle="collapse" data-parent="#ToolsGroup" data-target="#FormCreateClient">Create New Client</button>
                            <button class="btn btn-primary" data-toggle="collapse" data-parent="#ToolsGroup" data-target="#FormCreateEncounterType">Create New Encounter Type</button>
                            <button class="btn btn-primary" data-toggle="collapse" data-parent="#ToolsGroup" data-target="#FormCreateAction">Create New Action</button>
                    </div>
                </div>
            </div>
        </div> <!-- /Tools Panel -->

        <!-- Create New Action -->
        <div id="FormCreateAction" class="collapse">

            <create-action-type></create-action-type>

        </div>
        <!-- /Create New Action -->

        <!-- Create Encounter Type -->
        <div id="FormCreateEncounterType" class="collapse">

            <create-encounter-type></create-encounter-type>

        </div>
        <!-- /Create Encounter Type-->

        <!-- Create New Client -->
        <div id="FormCreateClient" class="collapse">

            <create-client></create-client>

        </div>
        <!-- /Create New Client -->


    <!-- Client Lookup Panel -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Client Lookup</div>

                <div class="panel-body">

                    <client-autocomplete-input></client-autocomplete-input>
<!--
                    <client-lookup></client-lookup>
-->
                </div>

            </div>
        </div>
    
    </div> <!-- /Client Lookup Panel -->

    <!-- Intake Form Panel -->

    <intake-form auth="{{ Auth::id() }}"></intake-form>

    <!-- /Intake Form Panel -->

</div><!-- /Container -->
@endsection
