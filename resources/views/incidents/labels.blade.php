@extends('layouts.app')

@section('content')
    <style>
        .state {
            display: inline-block;
            padding: 4px 8px;
            font-weight: bold;
            line-height: 20px;
            color: #fff;
            text-align: center;
            background-color: #999;
            border-radius: 3px
        }

        .state-open {
            background-color: #6cc644
        }
    </style>
<div class="container">
    <div class="row">

    </div>

    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    {!! count($query) !!} labels
                    <span class="pull-right">
                        <a href="">
                            <span class="fa fa-plus"></span> New label
                        </a>
                    </span>
                </div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                        @foreach($query as $label)
                            <tr>
                                <td style="width: 60%">
                                    <span class="state state-open"> {!! $label->name !!}</span>
                                </td>

                                <td style="width: 20%">
                                </td>

                                <td style="width: 20%">
                                    <div class="btn-group pull-right">
                                        <a href="" class="btn btn-default btn-sm">
                                            <span class="fa fa-pencil"></span>
                                            Edit
                                        </a>
                                        <a href="/incidents/labels/delete/{!! $label->id !!}" class="btn btn-default btn-sm">
                                            <span class="fa fa-close"></span>
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection