@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Categories Listing</h3>
        </div>
        <div class="box-body">
            <p>{!! $catTree !!}</p>
        </div>
        </div>
    </div>    
</div>
@stop