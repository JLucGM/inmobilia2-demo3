<h1 class="small-title">{{ __('message.info type business') }}</h1>

<div class="card">
    <div class="card-body">

        <div class="form-group">
            {{ Form::label(__('message.Name')) }}
            {{ Form::text('name', $typeBusiness->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
</div>

<div class="card-footer">
<button class="btn btn-outline-primary" type="submit" class="form-submit">{{ __('message.Save') }}</button>
</div>