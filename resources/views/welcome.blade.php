@extends('layouts.app')

@section('content')
<div class="container">
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
        <!-- Recent Statistics Panel-->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Activity (Past 30 Days)</div>

                <div class="panel-body">
                    <p><span class="big-number">00</span> Encounters</p>
                    <p><span class="big-number">00</span> Actions</p>
                    <p><span class="big-number">00</span> Hours Served</p>
                </div>
            </div>
        </div>

        <!-- Overall Statistics Panel-->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Overall Statistics</div>

                <div class="panel-body">
                    <p><span class="big-number">00</span> Encounters</p>
                    <p><span class="big-number">00</span> Actions</p>
                    <p><span class="big-number">00</span> Unique Clients</p>
                    <p><span class="big-number">00</span> Hours Served</p>
                </div>
            </div>
        </div>

    </div><!-- /Row -->

</div>

@endsection
