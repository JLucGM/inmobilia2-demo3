<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group col-12 mb-4">
            {{ Form::label('title') }}
            {{ Form::text('title', $popup->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 mb-4">
            {{ Form::label('description') }}
            {{ Form::text('description', $popup->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12  mt-4" id="c_logo">
            {!! Form::label('image', __('message.Image')) !!}<label class="text-danger" for="">* </label>
            {!! Form::file('image', ['class' => 'form-control'. ($errors->has('image') ? ' is-invalid' : ''),'accept'=>'image/*,video/*','max-size'=>'10485760','id'=>'image'],) !!}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
            <p>{{__('message.recommended size: 1280x720px')}}</p>
        </div>
       {{-- <div class="form-group col-12 mb-4">
            {{ Form::label('image') }}
            {{ Form::text('image', $popup->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>--}}
        <div class="form-group col-12 mb-4">
            {{ Form::label('url') }}
            {{ Form::text('url', $popup->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="row">
            
            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('start_date') }}
                {{ Form::text('start_date', $popup->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
                {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('end_date') }}
                {{ Form::text('end_date', $popup->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
                {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        {{--<div class="form-group col-12 mb-4">
            {{ Form::label('active') }}
            {{ Form::text('active', $popup->active, ['class' => 'form-control' . ($errors->has('active') ? ' is-invalid' : ''), 'placeholder' => 'Active']) }}
            {!! $errors->first('active', '<div class="invalid-feedback">:message</div>') !!}
        </div>--}}

        <div class="form-group col-12  mt-4">
            <div class="form-check form-switch">
                {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('active', '1', $popup->active, ['class' => 'form-check-input', 'id' => 'switch']) !!}
                <label class="form-check-label" for="switch">{{__('message.Active')}}</label>
            </div>
        </div>

    </div>
    <div class="card-footer mt-2">
        <button type="submit" class="btn btn-primary">{{__('message.Save')}}</button>
    </div>
</div>