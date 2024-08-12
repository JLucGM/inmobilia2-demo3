<div class="card">
    <div class="card-body">

        <div class=" row">

            <div class="form-group col-sm-6 mb-4">
                {{ Form::label('name',__('message.Name')) }}<label class="text-danger" for="">* </label>
                {{ Form::text('name', $negocio->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-sm-6 mb-4">
                {{ Form::label('budget', __('message.Budget')) }}<label class="text-danger" for="">* </label>
                {{ Form::text('budget', $negocio->budget, ['class' => 'form-control' . ($errors->has('budget') ? ' is-invalid' : ''), 'placeholder' => __('message.Budget')]) }}
                {!! $errors->first('budget', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('priority_id', __('message.priority'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                <select class="form-control {{ ($errors->has('priority_id') ? ' is-invalid' : '') }}" name="priority_id">
                    <option value="{{ $negocio->priority? $negocio->priority->id : '' }}">{{ $negocio->priority? __('message.' .strtolower($negocio->priority->name)) : __('message.priority') }}</option>
                    @foreach($priorities as $priority)
                    <option value="{{ $priority->id }}" {{ old('priority_id') == $priority->id? 'selected' : '' }}> {{ __('message.' . strtolower($priority->name)) }}</option>
                    @endforeach
                </select> {!! $errors->first('priority', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('type_business_id', __('message.business types'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                <select class="form-control {{ ($errors->has('type_business_id') ? ' is-invalid' : '') }}" name="type_business_id">
                    <option value="{{ $negocio->typeBusiness? $negocio->typeBusiness->id : '' }}">{{ $negocio->typeBusiness? __('message.' .strtolower($negocio->typeBusiness->name)) : __('message.business types') }}</option>
                    @foreach($typebusiness as $priority)
                    <option value="{{ $priority->id }}" {{ old('type_business_id') == $priority->id? 'selected' : '' }}> {{ __('message.' . strtolower($priority->name)) }}</option>
                    @endforeach
                </select> {!! $errors->first('priority', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 mb-4">
                {{ Form::label('dateend', __('message.dateend'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::date('dateend', $negocio->dateend, ['class' => 'form-control' . ($errors->has('dateend') ? ' is-invalid' : ''), 'placeholder' => __('message.dateend')]) }}
                {!! $errors->first('dateend', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-sm-6 mb-4">
                {{ Form::label('contacto_id', __('message.Contact')) }}<label class="text-danger" for="">* </label>
                {{ Form::select('contacto_id',$contactos, $negocio->contacto_id, ['class' => 'form-control' . ($errors->has('contacto_id') ? ' is-invalid' : ''), 'placeholder' => __('message.Contact')]) }}
                {!! $errors->first('contacto_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-sm-6 mb-4">
                {{ Form::label('propiedad_id', __('message.Properties')) }}<label class="text-danger" for="">* </label>
                {{ Form::select('propiedad_id',$propiedades, $negocio->propiedad_id, ['class' => 'form-control' . ($errors->has('propiedad_id') ? ' is-invalid' : ''), 'placeholder' => __('message.Properties')]) }}
                {!! $errors->first('propiedad_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-sm-6 mb-4">
                @if(Auth::user()->hasRole('super Admin'))
                {{ Form::label('agente_id', __('message.Agent')) }}<label class="text-danger" for="">* </label>
                {{ Form::select('agente_id', $agente, $negocio->agente_id, ['class' => 'form-control'. ($errors->has('agente_id')? 's-invalid' : ''), 'placeholder' => __('message.Select agent')]) }}
                @else
                {{ Form::hidden('agente_id', Auth::user()->id) }}
                @endif
                {!! $errors->first('agente_id', '<div class="invalid-feedback">:message</div>')!!}
            </div>
        </div>
    </div>
</div>
<div class="card-footer mt-2">
    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>
</div>