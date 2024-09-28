@extends('applayouts.app')
@section('title', 'Show User')

@section('content')
<!-- Exportable Table -->
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
                   <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="zmdi zmdi-caret-left-circle" ></i > Back </a>
               </div>
               <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>  </div>
        </div>
    </div>
</div>

@endsection