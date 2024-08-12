<h1 class="small-title">{{ __('message.info country') }}</h1>

<div class="card">
  <div class=" card-body">

    <div class="form-group col-12 mb-4">
      {{ Form::label('Nombre', __('message.Name'),['class'=>'form-label']) }}
      {{ Form::text('name', $pais->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
      {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>

  </div>
</div>
<div class="card-footer">
  <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>
</div>