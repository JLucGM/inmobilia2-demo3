<div class="card">
    <div class="card-body">

        <div class="form-group">
            {{ Form::label(__('message.Name')) }}
            {{ Form::text('name', $statusContact->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
</div>
<div class="card-footer mt-2">
    <button type="submit" class="btn btn-outline-primary">{{ __('message.Save')}}</button>
</div>