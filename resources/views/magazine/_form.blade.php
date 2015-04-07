<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create A Magazine</h3>
        </div>
        <div class="box-body">
            {!! Form::open(array('url' => 'magazine/create')) !!}
                <div class="form-group{!! ($errors->has('name')) ? ' has-error' : '' !!}">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', isset( $data['name'] ) ? $data['name'] : '', array('class'=>'form-control')) !!}
                    {!! ($errors->has('name') ? $errors->first('name') : '') !!}
                </div>
                <div class="form-group{!! ($errors->has('category_id')) ? ' has-error' : '' !!}">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', $categories, '', array('class'=>'form-control')) !!}
                    {!! ($errors->has('category_id') ? $errors->first('category_id') : '') !!}
                </div>
                <div class="form-group{!! ($errors->has('short_description')) ? ' has-error' : '' !!}">
                    {!! Form::label('short_description', 'Short Description') !!}
                    {!! Form::text('short_description', isset( $data['short_description'] ) ? $data['short_description'] : '', array('class'=>'form-control')) !!}
                    {!! ($errors->has('short_description') ? $errors->first('short_description') : '') !!}
                </div>
                <div class="form-group{!! ($errors->has('description')) ? ' has-error' : '' !!}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', isset( $data['short_description'] ) ? $data['short_description'] : '', array('class'=>'form-control')) !!}
                    {!! ($errors->has('description') ? $errors->first('short_description') : '') !!}
                </div>
                
                
                <div class="form-group">
                     {!! Form::submit('Save',array('class'=>'btn btp-primary')) !!}
                </div>
            {!! Form::close() !!}
        </div>
        </div>
    </div>    
</div>