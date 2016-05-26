@extends('layouts.app')

@section('content')
    <div class="container">
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