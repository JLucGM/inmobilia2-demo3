<h1 class="small-title">{{ __('message.info task') }}</h1>

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="form-group col-12 mb-4">
                {{ Form::label('name', __('message.Task title'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('name', $task->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Task title')]) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('tipoTarea', __('message.Task Type'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::select('tipoTarea',[
            'Contacto' => 'Contacto',
            'Visita' => 'Visita',
            'Cobranza' => 'Cobranza',
        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => __('message.Task Type')]) }}
                {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('horaInicio', __('message.Start date'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::datetimeLocal('horaInicio', $task->horaInicio, ['class' => 'form-control' . ($errors->has('horaInicio') ? ' is-invalid' : ''), 'placeholder' => __('message.Start date')]) }}
                {!! $errors->first('horaInicio', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('horaFin', __('message.Due date'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::datetimeLocal('horaFin', $task->horaFin, ['class' => 'form-control' . ($errors->has('horaFin') ? ' is-invalid' : ''), 'placeholder' => __('message.Due date')]) }}
                {!! $errors->first('horaFin', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('contacto_id', __('message.Associate with contact'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::select('contacto_id', $contactos, null,['class' => 'form-control' . ($errors->has('contacto_id') ? ' is-invalid' : ''), 'placeholder' => __('message.Select a contact')]) }}
                {!! $errors->first('contacto_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('product_id', __('message.Associate with property'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::select('product_id', $products,null, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => __('message.Select a property')]) }}
                {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            @if (isset($task->id))
            <div class="form-group col-12 col-md-6 mb-4">
                {{ Form::label('status', __('message.Status'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::select('status',[
            'Pendiente' => 'Pendiente',
            'En proceso' => 'En proceso',
            'Completado' => 'Completado',
            'Rechazado' => 'Rechazado',
        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => __('message.Status')]) }}
                {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            @endif

            <div class="form-group col-12 mb-4">
                {{ Form::label('description', __('message.Description'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::textarea('description', $task->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('message.Description'),'rows'=>'3']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            {{ Form::hidden('agente_id', Auth::user()->id) }}


        </div>
    </div>
</div>
<div class="card-footer mt-2">
    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>

</div>