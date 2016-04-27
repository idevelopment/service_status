@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="form-group">
                        <input type="text" placeholder="title" style="margin-bottom: 5px;" class="form-control">
                        <textarea name="" rows="15" class="form-control" placeholder="message"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h5 class="text-muted">Label:</h5>

                    <select class="form-control" name="" id="">
                        <option value="">Test</option>
                    </select>
                    <hr>
                    <h5 class="text-muted">Assign:</h5>

                    <select class="form-control" name="" id="">
                        <option value="">Test</option>
                    </select>
                    <hr>
                    <h5 class="text-muted">Status:</h5>

                    <select class="form-control" name="" id="">
                        <option value="">Test</option>
                    </select>
                    <hr>
                    <h5 class="text-muted">Service:</h5>

                    <select class="form-control" name="" id="">
                        <option value="">Test</option>
                    </select>

                </div>
            </form>
        </div>
    </div>
@endsection