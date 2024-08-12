<h1 class="my-3 small-title">{{ __('message.Contact information') }}</h1>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h1 class="my-3 small-title">{{ __('message.Main information') }}</h1>

                <div class="row">

                    <div class="form-group col-12 col-md-6 mb-4">
                        {{ Form::label('Nombre', __('message.Name'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                        {{ Form::text('name', $contacto->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 col-md-6 mb-4">
                        {{ Form::label('apellido',__('message.Last name'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                        {{ Form::text('apellido', $contacto->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => __('message.Last name')]) }}
                        {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-12 mb-4">
                        {{ Form::label('birthdate', __('message.birthdate'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                        {{ Form::date('birthdate', old('birthdate', $contacto->birthdate), ['class' => 'form-control'. ($errors->has('birthdate')? 's-invalid' : ''), 'placeholder' => __('message.birthdate')]) }}
                        @if(Request::route()->getName() == 'contactos.edit')

                        <span>{{__('message.birthdate')}}: </span>{{ \Carbon\Carbon::parse($contacto->birthdate)->format('d-m-Y') }}
                        @endif

                        {!! $errors->first('birthdate', '<div class="invalid-feedback">:message</div>')!!}
                    </div>
                </div>


                <h1 class="my-3 small-title">{{ __('message.Contact information') }}</h1>
                <div class="form-group col-12 mb-4">
                    {{ Form::label('email', __('message.Email'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                    {{ Form::text('email', $contacto->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('message.Email')]) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="row">

                    <div class="form-group col-12 col-md-6 mb-4">
                        {{ Form::label('telefonoContacto1', __('message.First phone'), ['class' => 'form-label']) }} <label class="text-danger" for="">* </label>
                        {{ Form::text('telefonoContacto1', $contacto->telefonoContacto1, ['class' => 'form-control' . ($errors->has('telefonoContacto1') ? ' is-invalid' : ''), 'placeholder' =>  __('message.First phone') ]) }}
                        {!! $errors->first('telefonoContacto1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-12 col-md-6 mb-4">
                        {{ Form::label('telefonoContacto2', __('message.Second phone'), ['class' => 'form-label']) }}
                        {{ Form::text('telefonoContacto2', $contacto->telefonoContacto2, ['class' => 'form-control' . ($errors->has('telefonoContacto2') ? ' is-invalid' : ''), 'placeholder' => __('message.Second phone') ]) }}
                        {!! $errors->first('telefonoContacto2', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-12 col-md-6 mb-4">
                        {{ Form::label('customer_type_id', __('message.customer types'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                        <select class="form-control {{ ($errors->has('customer_type_id') ? ' is-invalid' : '') }}" name="customer_type_id">
                            <option value="{{ $contacto->customerType? $contacto->customerType->id : '' }}">{{ $contacto->customerType? __('message.' .strtolower($contacto->customerType->name)) : __('message.customer types') }}</option>
                            @foreach($customertypes as $customertype)
                            <option value="{{ $customertype->id }}" {{ old('customer_type_id') == $customertype->id? 'selected' : '' }}> {{ __('message.' . strtolower($customertype->name)) }}</option>
                            @endforeach
                        </select> {!! $errors->first('customertype', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 col-md-6 mb-4">
                        {{ Form::label('origins_id', __('message.origin'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                        <select class="form-control {{ ($errors->has('origins_id') ? ' is-invalid' : '') }}" name="origins_id">
                            <option value="{{ $contacto->origins? $contacto->origins->id : '' }}">{{ $contacto->origins? __('message.' .strtolower($contacto->origins->name)) : __('message.origin') }}</option>
                            @foreach($origins as $origin)
                            <option value="{{ $origin->id }}" {{ old('origins_id') == $origin->id? 'selected' : '' }}>{{ __('message.' . strtolower($origin->name)) }}</option>
                            @endforeach
                        </select> {!! $errors->first('origin', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 col-md-6 mb-4">
                        {{ Form::label('status_contact_id', __('message.status contact'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                        <select class="form-control {{ ($errors->has('status_contact_id') ? ' is-invalid' : '') }}" name="status_contact_id">
                            <option value="{{ $contacto->statusContact? $contacto->statusContact->id : '' }}">{{ $contacto->statusContact? __('message.' .strtolower($contacto->statusContact->name)) : __('message.status contact') }}</option>
                            @foreach($statuscontacts as $statuscontact)
                            <option value="{{ $statuscontact->id }}" {{ old('status_contact_id') == $statuscontact->id? 'selected' : '' }}>{{ __('message.' . strtolower($statuscontact->name)) }}</option>
                            @endforeach
                        </select> {!! $errors->first('statuscontact', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 col-md-6 mb-4">
                        @if (auth()->user()->hasRole('super Admin') || auth()->user()->hasRole('admin'))
                        {{ Form::label('vendedorAgente_id', __('message.Agent'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                        <select class="form-control" name="vendedorAgente_id">
                            @foreach($agentes as $agente)
                            <option value="{{ $agente->id }}">{{ $agente->name }} {{ $agente->last_name }}</option>
                            @endforeach
                        </select>
                        @else
                        <!-- Si el usuario es agente, no mostrar select y asignar automáticamente su propio ID -->
                        <input type="hidden" name="vendedorAgente_id" value="{{ auth()->user()->id }}">
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h1 class="my-3 small-title">{{ __('message.Address') }}</h1>
                <div class="form-group col-12 mb-4">
                    {{ Form::label('pais', __('message.Country'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                    <select class="form-control {{ ($errors->has('pais') ? ' is-invalid' : '') }}" name="pais" id="paisSelect">
                        @if ($contacto->pais == null)
                        <option value="" selected>{{ __('message.Select a country') }}</option>
                        @endif
                        @foreach($paises as $pais)
                        <option value="{{ $pais->id }}" {{ old('pais') == $pais->id ? 'selected' : '' }} {{ ($contacto->pais == $pais->id) ? 'selected' : '' }}>{{ $pais->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-12 mb-4">
                    {{ Form::label('region', __('message.State'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                    <select class="form-control {{ ($errors->has('region') ? ' is-invalid' : '') }}" id="estadoSelect" name="region">
                        @if ($contacto->region == null)
                        <option value="" selected>{{ __('message.Select a state') }}</option>
                        @endif
                        @php
                        $estados = App\Models\Estado::pluck('name', 'id');
                        @endphp
                        @foreach($estados as $id => $name)
                        @if(old('region', $contacto->region) == $id)
                        <option value="{{ $id }}" selected>{{ $name }}</option>
                        @endif
                        @endforeach

                    </select>
                    {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-12 mb-4">
                    {{ Form::label('ciudad', __('message.City'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                    <select class="form-control {{ ($errors->has('ciudad') ? ' is-invalid' : '') }}" id="ciudadSelect" name="ciudad">
                        @if ($contacto->ciudad == null)
                        <option value="" selected>{{ __('message.Select a city') }}</option>
                        @endif
                        @php
                        $ciudades = App\Models\Ciudades::pluck('name', 'id');
                        @endphp
                        @foreach($ciudades as $id => $name)
                        @if(old('ciudad', $contacto->ciudad) == $id)
                        <option value="{{ $id }}" selected>{{ $name }}</option>
                        @endif
                        @endforeach
                    </select>
                    {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-12 mb-4">
                    {{ Form::label('direccion', __('message.Address'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                    {{ Form::text('direccion', $contacto->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => __('message.Address')]) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h1 class="my-3 small-title">{{ __('message.customer demands') }}</h1>

        <div class="row">
            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('min_budget', __('message.min budget'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('min_budget', $contacto->min_budget, ['class' => 'form-control' . ($errors->has('min_budget') ? ' is-invalid' : ''), 'placeholder' => __('message.min budget')]) }}
                {!! $errors->first('min_budget', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('max_budget', __('message.max budget'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('max_budget', $contacto->max_budget, ['class' => 'form-control' . ($errors->has('max_budget') ? ' is-invalid' : ''), 'placeholder' => __('message.max budget')]) }}
                {!! $errors->first('max_budget', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('min_area', __('message.min area'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('min_area', $contacto->min_area, ['class' => 'form-control' . ($errors->has('min_area') ? ' is-invalid' : ''), 'placeholder' => __('message.min area')]) }}
                {!! $errors->first('min_area', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('max_area', __('message.max area'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('max_area', $contacto->max_area, ['class' => 'form-control' . ($errors->has('max_area') ? ' is-invalid' : ''), 'placeholder' => __('message.max area')]) }}
                {!! $errors->first('max_area', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('bedrooms', __('message.Bedrooms'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('bedrooms', $contacto->bedrooms, ['class' => 'form-control' . ($errors->has('bedrooms') ? ' is-invalid' : ''), 'placeholder' => __('message.Bedrooms')]) }}
                {!! $errors->first('bedrooms', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('bathrooms', __('message.Bathrooms'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('bathrooms', $contacto->bathrooms, ['class' => 'form-control' . ($errors->has('bathrooms') ? ' is-invalid' : ''), 'placeholder' => __('message.Bathrooms')]) }}
                {!! $errors->first('bathrooms', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-12 col-md-3 mb-4">
                {{ Form::label('garage', __('message.Garage'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('garage', $contacto->garage, ['class' => 'form-control' . ($errors->has('garage') ? ' is-invalid' : ''), 'placeholder' => __('message.Garage')]) }}
                {!! $errors->first('garage', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-12 col-md-3">
                <label class="form-label">{{ __('message.Type of property') }}</label>
                <select class="form-control" name="tipoPropiedad_id" id="t_propiedades">
                    <option value="{{ $contacto->tipoPropiedad? $contacto->tipoPropiedad->id : '' }}">{{ $contacto->tipoPropiedad? $contacto->tipoPropiedad->nombre : __('message.Type of property') }}</option>

                    @foreach ($tipoPropiedad as $item)
                    <option value="{{ $item->id }}" {{ old('tipoPropiedad_id') == $item->id ? 'selected' : '' }}>
                        {{ __('message.' . strtolower($item->nombre)) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-12 mb-4">
            {{ Form::label('observaciones', __('message.Observations'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
            {{ Form::textarea('observaciones', $contacto->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => __('message.Observations')]) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
</div>


<div class="card-footer mt-2">
    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{ __('message.Save') }}</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Select dependiente de municipio, hereda de estado
    $(function() {
        $('#paisSelect').on('change', onSelectProjectChange);
        $('#estadoSelect').on('change', onSelectProjectChanges);
    });

    function onSelectProjectChange() {
        var projectId = $(this).val();
        var selectStateText = '{{ __("message.Select a state") }}';

        if (!projectId) {
            $('#estadoSelect').html(getSelectOptions(selectStateText));
        } else {
            $.ajax({
                type: 'GET',
                url: '/pais/' + projectId + '/estado',
                success: function(data) {
                    var options = getSelectOptions(selectStateText);
                    $.each(data, function(index, estado) {
                        options += '<option value="' + estado.id + '">' + estado.name + '</option>';
                    });
                    $('#estadoSelect').html(options);
                }
            });
        }
    }

    function onSelectProjectChanges() {
        var projectId2 = $(this).val();
        var selectCityText = '{{ __("message.Select a city") }}';

        if (!projectId2) {
            $('#ciudadSelect').html(getSelectOptions(selectCityText));
        } else {
            $.ajax({
                type: 'GET',
                url: '/estado/' + projectId2 + '/ciudad',
                success: function(data) {
                    var options = getSelectOptions(selectCityText);
                    $.each(data, function(index, ciudad) {
                        options += '<option value="' + ciudad.id + '">' + ciudad.name + '</option>';
                    });
                    $('#ciudadSelect').html(options);
                }
            });
        }
    }

    function getSelectOptions(text) {
        return '<option value="">' + text + '</option>';
    }
</script>