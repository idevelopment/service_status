@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-9 col-md-9 col-sm-9 col-lg-9">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                    <form style="padding-bottom: 15px" class="form-inline">
                        <input type="email" class="form-control" placeholder="Search term">
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                    <div class="pull-right btn-group">
                        <a href="{!! route('incidents.open') !!}" class="btn btn-default">
                            Open <span class="label label-danger">{!! $open !!}</span>
                        </a>
                        <a href="{!! route('incidents.closed') !!}" class="btn btn-default">
                            Closed <span class="label label-success">{!! $closed !!}</span>
                        </a>
                        <a href="" class="btn btn-default">Labels</a>
                    </div>
                </div>

            </div>

            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status:</th>
                        <th>Title:</th>
                        <th></th> {{-- Actions --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($query as $data)
                        <tr>
                            <td> <code> #{!! $data->id !!} </code> </td>
                            <td>
                                @foreach($data->issues as $issue)
                                    <span class="label label-info">{{ $issue->name }}</span>
                                @endforeach
                            </td>
                            <td><a href=""> {!! $data->title !!} </a> </td>
                            <td>
                                <a href="{{ route('incidents.show', ['id' => $data->id]) }}">
                                    <span class="label label-success">Show</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $query->render() !!}
        </div>

        <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item">All incidents</a>
                <a href="{!! route('incidents.create') !!}" class="list-group-item">Report incident</a>
                <a href="{!! route('incidents.you') !!}" class="list-group-item">Assigned to you</a>
            </div>
        </div>
    </div>
</div>
@endsection
