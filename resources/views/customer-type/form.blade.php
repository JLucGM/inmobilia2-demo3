<h1 class="small-title">{{ __('message.info customer type') }}</h1>

<div class="card">
    <div class="card-body">
        <div class="form-group">
            {{ Form::label( __('message.Name')) }}
            {{ Form::text('name', $customerType->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-outline-primary">{{ __('message.Save')}}</button>
</div>