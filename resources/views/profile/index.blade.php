@extends('layouts.app')

@section('content')
    {{-- TODO: Implement flash message to the view --}}
    {{-- TODO: Weave validation errors into the view.--}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Settings</div>

                    <div class="list-group">
                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="list-group-item">
                            Profile settings
                        </a>
                        <a href="#security" aria-controler="security" role="tab" data-toggle="tab" class="list-group-item">
                            Security
                        </a>
                        <a href="#api" aria-controler="api" role="tab" data-toggle="tab" class="list-group-item">
                            API settings
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content">
                    {{-- Profile tab --}}
                    <div role="tabpanel" class="tab-pane fade in active" id="profile">
                        {{-- Panel--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Profile information.
                            </div>
                            <div class="panel-body">
                                <form action="{{ route('profile.update.information') }}" enctype="multipart/form-data" method="post" class="form-horizontal">
                                    {{ csrf_field() }}

                                    {{-- Name form-group --}}
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-3 control-label">
                                            Name <strong class="text-danger">*</strong>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" name="name" value="{{ $query->name }}" class="form-control">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Email form-group --}}
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="email" class="col-md-3 control-label">
                                            Email: <strong class="text-danger">*</strong>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="email" name="email" value="{{ $query->email }}" class="form-control">

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Mobile phone number form-group --}}
                                    <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : '' }}">
                                        <label for="mobilePhone" class="col-md-3 control-label">
                                            Mobile phone <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="mobilePhone" name="mobile_number" value="{{ $query->mobile_number }}" class="form-control">

                                            @if ($errors->has('mobile_phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Office phone number form-group --}}
                                    <div class="form-group {{ $errors->has('office_number') ? 'has-error' : '' }}">
                                        <label for="officePhone" class="col-md-3 control-label">
                                            Office phone <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="mobilePhone" name="office_phone" value="{{ $query->office_number }}" class="form-control">

                                            @if ($errors->has('office_phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('office_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- SUBMIT & RESET button --}}
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>

                                </form>
                            </div>
                        </div>
                        {{-- END panel --}}
                    </div>

                    {{-- API Tab --}}
                    <div role="tabpanel" class="tab-pane fade in" id="api">
                        {{-- Create new api key panel --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">Create new api token</div>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('key.new') }}" class="form-inline">
                                    {{-- CSRF token --}}
                                    {{ csrf_field() }}

                                    <input type="text" class="form-control" name="service" placeholder="Service name" />
                                    <button class="btn btn-success" type="submit">Create</button>
                                </form>
                            </div>
                        </div>

                        {{-- LIst services panel --}}
                        @if(count($keys) === 0)
                            <div class="alert alert-danger">
                                You don't have any registered services for the API.
                            </div>
                        @else
                            <div class="panel panel-default">
                                <div class="panel-heading">Service(s):</div>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> Service: </th>
                                        <th> API key: </th>
                                        <th></th> {{-- Functions --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($keys as $key)
                                        <tr>
                                            <td>{{ $key->service }}</td>
                                            <td><code>{{ $key->key }}</code></td>
                                            <td>
                                                <a href="#" style="margin-right: 3px" class="label label-info">
                                                    Info
                                                </a>
                                                <a style="margin-right: 3px;" href="{!! route('key.logs', ['keyId' => $key->id]) !!}" class="label label-info">
                                                    Logs
                                                </a>
                                                <a href="{!! route('key.destroy', ['keyId' => $key->id]) !!}" class="label label-danger">
                                                    Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

                    {{-- Security tab --}}
                    <div role="tabpanel" class="tab-pane fade in" id="security">
                        <div class="panel panel-default">
                            <div class="panel-heading">Security information.</div>

                            <div class="panel-body">
                                <form action="{{ route('profile.update.security') }}" method="POST" class="form-horizontal">
                                    {{-- CSRF token --}}
                                    {{ csrf_field() }}

                                    {{-- Password form-group --}}
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="password" class="col-md-3 control-label"> Password: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="password" placeholder="Password" name="password" class="form-control">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Password confirmation form-group--}}
                                    <div class="form-group">
                                        <label for="password2" class="col-md-3 control-label"> Confirm password: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="password2" placeholder="Repeat password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>

                                    {{-- SUBMIT & RESET button --}}
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection