@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Panel--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Profile information.
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('profile') }}" method="post" class="form-horizontal">
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

                            {{-- Password form-group --}}
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label"> Password: </label>
                                <div class="col-md-6">
                                    <input type="text" id="password" placeholder="Password" name="password" class="form-control">
                                </div>
                            </div>

                            {{-- Password confirmation form-group --}}
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
                {{-- END panel --}}
            </div>
        </div>
    </div>
@endsection