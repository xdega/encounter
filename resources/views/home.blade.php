@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Tools Panel-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tools</div>

                <div class="panel-body text-center">
                        <button class="btn btn-primary">Create New Client</button>
                        <button class="btn btn-primary">Create New Encounter Type</button>
                        <button class="btn btn-primary">Create New Action</button>
                </div>
            </div>
        </div>
    </div> <!-- /Tools Panel -->

    <!-- Client Lookup Panel -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Client Lookup</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <!-- Client Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Client Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    View Client Profile
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    
    </div> <!-- /Client Lookup Panel -->

    <!-- Intake Panel -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Intake Form</div>

                <div class="panel-body">
                    <!-- Intake Form -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <!-- Client Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Client Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Date/Time -->
                        <div class="form-group{{ $errors->has('date-time') ? ' has-error' : '' }}">
                            <label for="date-time" class="col-md-4 control-label">Date/Time</label>

                            <div class="col-md-6">
                                <input id="date-time" type="datetime-local" class="form-control" name="date-time" value="{{ old('date-time') }}" required>

                                @if ($errors->has('date-time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date-time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration (Minutes)</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" class="form-control" name="duration" value="{{ old('duration') }}" required>

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- Encounter Type -->
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Encounter Type</label>

                            <div class="col-md-6">
                                <select id="type" type="text" class="form-control" name="type" value="{{ old('type') }}" required>
                                    <option>General Meeting</option>
                                    <option>Personal Accompaniment</option> 
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Action Taken -->
                        <div class="form-group{{ $errors->has('action') ? ' has-error' : '' }}">
                            <label for="action" class="col-md-4 control-label">Action Taken</label>

                            <div class="col-md-6">
                                <select id="action" type="select" class="form-control" name="action" value="{{ old('action') }}" required>
                                    <option>None</option>
                                    <option>Referral to X Organization</option>
                                </select>

                                @if ($errors->has('action'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('action') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Comments -->
                        <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                            <label for="comments" class="col-md-4 control-label">Comments</label>

                            <div class="col-md-6">
                                <textarea id="comments" type="textarea" rows="5" class="form-control" name="comments" value="{{ old('comments') }}"></textarea>

                                @if ($errors->has('comments'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Record
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    
    </div> <!-- /Intake Panel -->

</div><!-- /Container -->
@endsection
