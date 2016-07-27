@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        {{-- Tab panels --}}
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#info" aria-controls="info" role="tab" data-toggle="tab">
                        <span class="fa fa-info-circle"></span> Info
                    </a>
                </li>
                <li role="presentation">
                    <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                        <span class="fa fa-commenting"></span> Comments
                    </a>
                </li>
            </ul>
        </div>
        {{--  End tab panels --}}

        {{-- Tab content --}}
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active fade in" id="info">
                <div style="margin-top: 10px;" class="col-md-9">
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
            </div>

            <div role="tabpanel" class="tab-pane fade in" id="comments">
                <div style="margin-top: 10px;" class="col-md-9">
                    TODO: Comments section.
                </div>
            </div>
        </div>
        {{-- END tab content --}}

        <div style="margin-top: 10px;" class="col-md-3">
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