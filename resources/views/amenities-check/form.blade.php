<div class="card">
    <div class="card-body">

        <div class="form-group mb-3">
            {{ Form::label( __('message.Name') ) }}
            {{ Form::text('name', $amenitiesCheck->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label( __('message.Category of amenities') ) }}
            {{ Form::select('amenities_id', $amenities->pluck('name', 'id'), $amenitiesCheck->amenities_id, ['class' => 'form-control' . ($errors->has('amenities_id') ? ' is-invalid' : ''), 'placeholder' => __('message.Select category')]) }}
            {!! $errors->first('amenities_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
</div>
<div class="card-footer ">
    <button type="submit" class="btn btn-outline-primary">{{__('message.Save')}}</button>
</div>