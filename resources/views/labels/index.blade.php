@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Label search --}}
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Search label</div>
                    <div class="panel-body">
                        <form action="" method="POST" class="form-horizontal">
                            {{-- CSRF token --}}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="term" class="col-md-3 control-label">Name:</label>
                                        <div class="col-md-8">
                                            <input type="text" id="term" name="term" class="form-control" placeholder="search term">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">&nbsp;</label>
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal">
                                                New label
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- END label search --}}

            {{-- Label overview --}}
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(count($query) > 0)
                            <table class="table table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name:</th>
                                    <th>Color:</th>
                                    <th>Description:</th>
                                    <th></th> {{-- Functions --}}
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($query as $data)
                                        <tr>
                                            <td><code>#L{{ $data->id }}</code></td>
                                            <td> {{ $data->name }} </td>
                                            <td> <span class="label label-info"> {{ $data->color }} </span> </td>
                                            <td> {{ $data->description }} </td>

                                            {{-- Function bar --}}
                                            <td>
                                                <a class="label label-primary" href="{{ route('') }}">Edit</a>
                                                <a class="label label-primary" href="{{ route('') }}">Delete</a>
                                            </td>
                                            {{-- End function bar --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning">
                                There are no labels found into the system.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{--  End label overview--}}
        </div>
    </div>

    {{-- Label insert modal --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            {{-- Modal content --}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    {{-- END label insert view --}}
@endsection