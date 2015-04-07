<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create A Category</h3>
        </div>
        <div class="box-body">
            {!! Form::open(array('url' => 'category/create')) !!}
                <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', isset( $data['name'] ) ? $data['name'] : '', array('class'=>'form-control')) !!}
                    {!! ($errors->has('name') ? $errors->first('name') : '') !!}
                </div>
                <div class="form-group{!! ($errors->has('parent_id')) ? ' has-error' : '' !!}">
                    {!! Form::label('parent_id', 'Is Any Parents ?') !!}
                    {!! Form::select('parent_id', $categories, isset( $data['parent_id'] ) ? $data['parent_id'] : '', array('class'=>'form-control')) !!}
                    {!! ($errors->has('parent_id') ? $errors->first('name') : '') !!}
                </div>
                <div class="form-group">
                     {!! Form::submit('Save',array('class'=>'btn btp-primary')) !!}
                </div>
            {!! Form::close() !!}
        </div>
        </div>
    </div>    
</div>