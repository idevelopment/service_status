@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">

                {{-- Panel --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ticket a new incident.
                    </div>

                    <div class="panel-body">
                        <form action="{!! route('incidents.store') !!}" class="form-horizontal" method="post">
                            {{ csrf_field() }}

                            {{-- Title form-group--}}
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="text" name="title" placeholder="Incident placeholder" class="form-control">
                                </div>
                            </div>

                            {{-- Assigned users group --}}
                            <div class="form-group">
                                <div class="col-md-6">
                                    <select class="form-control" name="assigned">
                                        <option value="">-- Assigned user --</option>

                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <select name="services" class="form-control">
                                        <option value="">-- Select your service --</option>

                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Message form group --}}
                            <div class="form-group">
                                <div class="col-md-8">
                                    <textarea rows="8" name="message" class="form-control" placeholder="Incident description"></textarea>
                                </div>
                            </div>

                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-success">Insert</button>
                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
                {{-- End panel --}}

            </div>
        </div>
    </div>
@endsection