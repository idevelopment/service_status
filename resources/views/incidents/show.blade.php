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
                    @if(count($comments) === 0)
                        <div class="alert alert-danger">
                            <p>
                                There are no comments on this incident ticket.
                                You can <a href="#" data-toggle="modal" data-target="#myModal">create</a> one.
                            </p>
                        </div>
                    @else
                        @foreach($comments as $comment)
                            <div class="well well-sm">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img style="width: 64px; height: 64px;" class="img-rounded media-object" src="..." alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media head</h4>
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $comments->render() }}
                    @endif
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

    {{-- Add comment modal --}}
    @if(count($incident->comments) === 0)
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add a new comment</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('comment', ['id' => $incident->id]) }}" method="POST">
                            {{-- CSRF token --}}
                            {{ csrf_field() }}

                            <textarea name="comment" rows="10" class="form-control" placeholder="Comment message"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- end comment modal --}}
@endsection