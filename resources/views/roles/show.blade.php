@extends('applayouts.app')
@section('title', 'Show Role')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <style type="text/css">
                    .buttons-print{
                        background: #405faf !important;
                    }
                    .buttons-html5{
                        background: #405faf !important;
                    }
                    .page-link{
                        background: #405faf !important;
                    }
                </style>
            </div>
            <div class="body">
                <div class="pull-right">
                   <a class="btn btn-primary" href="{{ route('roles.index') }}"><i class="zmdi zmdi-caret-left-circle" ></i > Back </a>
               </div>


               <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endsection