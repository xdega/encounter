@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <!-- Welcome Panel-->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Welcome to Encounter! Social impact tracking made easy.
                </div>
            </div>
        </div>

        <!-- Recent Statistics Panel-->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Statistics (Past 30 Days)</div>

                <div class="panel-body">
                    <p><span class="big-number">00</span> Encounters</p>
                    <p><span class="big-number">00</span> Actions</p>
                    <p><span class="big-number">00</span> Hours Served</p>
                </div>
            </div>
        </div>

        <!-- Overall Statistics Panel-->
        <div class="col-md-4">
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

    </div>


</div>
@endsection
