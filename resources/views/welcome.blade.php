@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row">
        
        <!-- Welcome Panel-->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Welcome to Encounter! Social impact tracking made easy.
                </div>
            </div>
        </div>
    </div><!-- /Row -->

    <div class="row">
        <!-- Overview Graph -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Monthly Overview</div>

                <div class="panel-body">
                    <canvas id="MonthlyOverviewChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Annual Overview</div>

                <div class="panel-body">
                    <canvas id="AnnualOverviewChart"></canvas>
                </div>
            </div>
        </div>

    </div><!-- /Row -->

    <div class="row">

        <!-- Monthly Statistics Panel-->
        <monthly-statistics-panel></monthly-statistics-panel>
        <!-- /Monthly Statistics Panel -->

        <!-- Overall Statistics Panel-->
        <overall-statistics-panel></overall-statistics-panel>
        <!-- /Overall Statistics Panel -->

    </div><!-- /Row -->
</div><!-- /Container -->
@endsection
