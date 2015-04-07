@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Magazine Listing</h3>
          <div class="box-tools">
             {!! Form::open(array('url' => 'magazine','method'=>'get')) !!}
            <div class="input-group">
              <input type="text" placeholder="Search" style="width: 150px;" class="form-control input-sm pull-right" name="mag_search" value="{!! isset( $data['mag_search'] ) ? $data['mag_search'] : '' !!}">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>ID</th>
              <th>Category</th>
              <th>Name</th>
              <th>Status</th>
              <th>Short Description	</th>
            </tr>
            <tr>
            @forelse ($magazines as $magazine)
              <td>{!! $magazine->id !!}</td>
              <td>{!! Horsefly\Category::getNameById( $magazine->category_id ) !!}</td>
              <td>{!! $magazine->name !!}</td>
              <td>
              @if ($magazine->is_active == 1)
              <span class="label label-success">Active</span>
              @else
              <span class="label label-danger">Danger</span>
              @endif
              </td>
              <td>{!! $magazine->short_description !!}</td>
              </tr>
            @empty
                <td></td>
                <td></td>
                <td></td>
                <td>No Data Found</td>
                <td></td>
                <td></td>
            @endforelse 
            
          </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
@stop