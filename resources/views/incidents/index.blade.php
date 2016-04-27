@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-9 col-md-9 col-sm-9 col-lg-9">
            <form style="padding-bottom: 15px" class="form-inline">
                <input type="email" class="form-control" placeholder="Search term">
                <button type="submit" class="btn btn-default">Search</button>
            </form>

            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status:</th>
                        <th>Title:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($query as $data)
                        <tr>
                            <td> <code> #{!! $data->id !!} </code> </td>
                            <td> {!! $data->status !!} </td>
                            <td><a href=""> {!! $data->title !!} </a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $query->render() !!}
        </div>

        <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item disabled">All incidents</a>
                <a href="#" class="list-group-item">Report incident</a>
                <a href="#" class="list-group-item">Assigned to you</a>
            </div>
        </div>
    </div>
</div>
@endsection
