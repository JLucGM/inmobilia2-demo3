<h1 class="small-title">{{ __('message.info state') }}</h1>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label(__('message.Name')) }}
                    {{ Form::text('name', $estado->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-12 col-md-6">
                {{ Form::label(__('message.Country belonging')) }}
                <select class="form-control" name="pais_id">
                    @foreach ($paises as $pais)
                    <option value="{{$pais->id}}" {{ isset($estado->paise) && $pais->id == $estado->paise->id ? 'selected' : '' }}>{{$pais->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>
</div>
<div class="card-footer mt-2">
    <button type="submit" class="btn btn-outline-primary">{{__('message.Save')}}</button>
</div>