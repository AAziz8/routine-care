@extends('applayouts.app')
@section('title', 'Dashboard')
@section('content')

<?php $user_role = request()->cookie('user_role'); ?>
 <?php if ($user_role == 'Admin') { ?> 
    <div class="alert alert-success">Dashboard Pending</div>

<?php }else{} ?>
@endsection
