@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <code> #{{ $incident->id }} </code>
                    <strong>{{ $incident->title }}</strong>

                    <div class="pull-right">
                        <a href="" class="label label-warning">Edit incident</a>
                        <a href="" class="label label-danger">Close incident</a>
                    </div>
                </div>
                <div class="panel-body">
                    {{ $incident->message }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Incident Information</div>

                <ul class="list-group">
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong>Author:</strong>
                        </span>
                        <span class="label label-info">Tim Joosten</span>
                    </li>

                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong>Assigned:</strong>
                        </span>
                        <span class="label label-info">Kieran Claessens</span>
                    </li>

                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong>Status</strong>
                        </span>
                        <span class="label label-success">
                            Open
                        </span>
                    </li>

                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong>Created at:</strong>
                        </span>
                        <span class="label label-success">
                            {{ date('d-m-Y', strtotime($incident->created_at)) }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection