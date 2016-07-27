@extends('layouts.app')

@section('content')
    {{-- TODO: Implement flash message to the view --}}
    {{-- TODO: Weave validation errors into the view.--}}

    <div class="container">
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
                                    <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">
                                            Name <strong class="text-danger">*</strong>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" name="name" value="{{ $query->name }}" class="form-control">
                                        </div>
                                    </div>

                                    {{-- Email form-group --}}
                                    <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">
                                            Email: <strong class="text-danger">*</strong>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="email" name="email" value="{{ $query->email }}" class="form-control">
                                        </div>
                                    </div>

                                    {{-- Mobile phone number form-group --}}
                                    <div class="form-group">
                                        <label for="mobilePhone" class="col-md-3 control-label">
                                            Mobile phone <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="mobilePhone" name="mobile_number" value="{{ $query->mobile_number }}" class="form-control">
                                        </div>
                                    </div>

                                    {{-- Office phone number form-group --}}
                                    <div class="form-group">
                                        <label for="officePhone" class="col-md-3 control-label">
                                            Office phone <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="mobilePhone" name="office_phone" value="{{ $query->office_number }}" class="form-control">
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
                                <form method="POST" action="" class="form-inline">
                                    {{-- CSRF token --}}
                                    {{ csrf_field() }}

                                    <input type="text" class="form-control" name="service" placeholder="Service name" />
                                    <button class="btn btn-success" type="submit">Create</button>
                                </form>
                            </div>
                        </div>

                        {{-- LIst services panel --}}
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Coming soon
                            </div>
                        </div>
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
                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label"> Password: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="password" placeholder="Password" name="password" class="form-control">
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