<div class="p-1">
    <div class=" row">
        <div class="form-group col-12 mb-4">
            {{ Form::label('tipoRelacion', __('message.Relationship type'),['class'=>'mb-4']) }}<label class="text-danger" for="">* </label>
            {{ Form::select('tipoRelacion',[
            'interesado' => 'Interesado',
            'Colega' => 'Colega',
            'Constructora' => 'Constructora',
            'Inversionista' => 'Inversionista',
            'Consulta' => 'consulta',
            'Propietario' => 'Propietario',
            'Inquilinos' => 'Inquilinos',
            'Personales' => 'Personales',
            'Deshabilitados' => 'Deshabilitado',
        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de relacion']) }}
            {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        
        <div class="form-group col-12 mb-4">
            {{ Form::label('product_id', __('message.Property of interest'),['class'=>'mb-4']) }}
            {{ Form::select('product_id', $product,null, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Propiedad']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 mb-4">
            {{ Form::label('observaciones', __('message.Observations'),['class'=>'mb-4']) }}
            {{ Form::textarea('observaciones', $contactosPropiedad->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => __('message.Observations'),'rows'=>'2']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <input type="hidden" name="contacto_id" id="" value="{{ $id }}">

    </div>
    <div class="">
        <button class="btn btn-outline-primary" type="submit" class="form-submit">{{ __('message.Save')}}</button>
    </div>
</div>