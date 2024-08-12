@php
$html_tag_data = [];
$title = __('message.Update property');
$description= __('message.Update property')
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<div class="container">

    <h1>{{ $title }}</h1>

    <div class="d-flex justify-content-between mb-4">
        <h1 class="small-title">{{ __('message.info property') }}</h1>
    </div>

    <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                <h2 class="small-title">{{__('message.Property Information')}}</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">{{__('message.Name')}}</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('message.Type of property') }}</label>
                            <!-- <input class="form-control" type="text" list="t_propisedades" name="tipoPropiedad_id" placeholder="Tipo de propiedad"> -->
                            <select class="form-control" id="t_propiedades" name="t_propiedades">
                                @foreach ($tipoPropiedad as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->tipoPropiedad_id ? 'selected' : '' }}>
                                    {{ __('message.' . strtolower($item->nombre)) }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ __('message.business types') }}</label>
                                <select class="form-control" name="type_business_id">
                                    <option value="{{$product->typeBusiness->id}}">{{$product->typeBusiness->name}}</option>
                                    @foreach ($typebusinesses as $typebusiness)
                                    <option value="{{$typebusiness->id}}">{{$typebusiness->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ __('message.physical state') }}</label>
                                <select class="form-control" name="phy_state_id">
                                    <option value="{{$product->phyState->id}}">{{$product->phyState->name}}</option>
                                    @foreach ($phystates as $phystate)
                                    <option value="{{$phystate->id}}" {{ old('phy_state_id') == $phystate->id ? 'selected' : '' }}>{{$phystate->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ __('message.Price') }}</label>
                                <input class="form-control" type="number" name="price" value="{{$product->price}}" placeholder="{{ __('message.Price') }}" required>
                            </div>

                            @if(auth()->user()->roles->contains('name', 'super Admin') || auth()->user()->roles->contains('name', 'admin'))
                            <div class="form-group col-md-6">
                                {{ Form::label('agenteVendedor_id', __('message.Assign real estate agent') , ['class' => 'form-label']) }}
                                <!-- ROLE VENDEDOR -->
                                {{ Form::select('agenteVendedor_id', $asignadoa, $asignado, ['class' => 'form-control' . ($errors->has('agenteVendedor_id') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('agenteVendedor_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            @else()
                            <input type="text" value="{{auth()->user()->id}}" name="agenteVendedor_id" hidden>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">{{ __('message.Description') }}</label>
                                <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-12">
                                <label class="form-label">{{ __('message.Stand out?') }}</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="destacado" value="0">
                                    <input class="form-check-input" type="checkbox" role="switch" name="destacado" value="1" id="inputDestacado" {{ $product->destacado ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inputDestacado">{{ __('message.Yes') }}</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">{{ __('message.Publish the property') }}</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="publicar" value="1" id="flexSwitchCheckDefault" {{ $product->publicar ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{ __('message.Yes') }}</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">{{ __('message.Publish price?') }}</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="publicarPrecio" value="0">
                                    <input class="form-check-input" type="checkbox" role="switch" name="publicarPrecio" value="1" id="inputpublicarPrecio" {{ $product->publicarPrecio ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inputpublicarPrecio">{{ __('message.Yes') }}</label>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-4">
                <h1 class="my-3 small-title">{{ __('message.Property details') }}</h1>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">{{ __('message.Bedrooms') }}</label>
                                <input class="form-control" type="number" name="dormitorios" value="{{$product->dormitorios}}" placeholder="{{ __('message.Bedrooms') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">{{ __('message.Garage') }}</label>
                                <input class="form-control" type="number" name="cocheras" value="{{ $product->cocheras}}" placeholder="{{ __('message.Garage') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">{{ __('message.Bathrooms') }}</label>
                                <input class="form-control" type="number" name="toilet" value="{{$product->toilet}}" placeholder="{{ __('message.Bathrooms') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">{{ __('message.Total M2') }}</label>
                                <input class="form-control" type="text" name="metrosCuadradosT" value="{{$product->metrosCuadradosT}}" placeholder="{{ __('message.Total M2') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">{{ __('message.Mts2 Covered') }}</label>
                                <input class="form-control " type="number" name="metrosCuadradosC" value="{{$product->metrosCuadradosC}}" placeholder="{{ __('message.Mts2 Covered') }}" required>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="col-12">

                    <h2 class="small-title">{{ __('message.Upload cover') }}</h2>
                    <div class="card">
                        <div class="card-body">
                            <form class="" action="{{ route('pjsonimages', ['id' => $product->id]) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="mb-2">
                                    <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="w-100 mb-2" alt="Imagen de la propiedad">
                                    <input class="form-control" type="file" name="portada" label="image" id="image" multiple>
                                </div>

                                <button type="submit" class="btn btn-outline-primary my-2" id="">
                                    {{ __('message.Save') }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <h2 class="small-title">{{ __('message.Property gallery') }}</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="my-2">
                                <div class="row">
                                    @foreach($images as $image)
                                    <div class="col-6">
                                        <div class="border rounded mb-2">
                                            <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $image->name) }}" class="rounded w-100 mb-2" alt="Imagen de la propiedad">
                                            <div class="d-flex align-items-center mx-2">

                                                {{$image->name}}
                                                <form action="{{ route('pjsondelete', ['id' => $product->id, 'imageId' => $image->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn"><i class="cs-bin"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <form class="" action="{{ route('pjsonimages', ['id' => $product->id]) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PATCH')
                                <input class="form-control" type="file" name="image[]" label="image" id="image" multiple>
                                <button type="submit" class="btn btn-outline-primary my-2" id="">
                                    {{ __('message.Save') }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <h1 class="my-3 small-title">{{ __('message.Amenities') }}</h1>
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        @foreach($amenities as $amenityCheck)
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" name="amenities[]" value="{{ $amenityCheck->id }}" @if($amenitiesChecks->contains('amenities_checks_id', $amenityCheck->id)) checked @endif>
                            <label>{{ __('message.'.strtolower($amenityCheck->name)) }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <h1 class="my-3 small-title">{{ __('message.Location') }}</h1>

            <div class="card">
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="form-group col-12 mb-4">
                            {{ Form::label('pais', __('message.Country'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                            <select class="form-control {{ ($errors->has('pais') ? ' is-invalid' : '') }}" name="pais" id="paisSelect">
                                @if ($product->pais == null)
                                <option value="" selected>{{ __('message.Select a country') }}</option>
                                @endif
                                @foreach($paises as $pais)
                                <option value="{{ $pais->id }}" {{ old('pais') == $pais->id ? 'selected' : '' }} {{ ($product->pais == $pais->id) ? 'selected' : '' }}>{{ $pais->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-12 mb-4">
                            {{ Form::label('region', __('message.State'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                            <select class="form-control {{ ($errors->has('region') ? ' is-invalid' : '') }}" id="estadoSelect" name="region">
                                @if ($product->region == null)
                                <option value="" selected>{{ __('message.Select a state') }}</option>
                                @endif
                                @foreach($estados as $estad)
                                <option value="{{ $estad->id }}" {{ old('region') == $estad->id ? 'selected' : '' }} {{ ($product->region == $estad->id) ? 'selected' : '' }}>{{ $estad->name }}</option>
                                @endforeach
                            </select> {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-12 mb-4">
                            {{ Form::label('ciudad', __('message.City'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                            <select class="form-control {{ ($errors->has('ciudad') ? ' is-invalid' : '') }}" id="ciudadSelect" name="ciudad">
                                @if ($product->ciudad == null)
                                <option value="" selected>{{ __('message.Select a city') }}</option>
                                @endif
                                @foreach($ciudades as $ciudade)
                                <option value="{{ $ciudade->id }}" {{ old('ciudad') == $ciudade->id ? 'selected' : '' }} {{ ($product->ciudad == $ciudade->id) ? 'selected' : '' }}>{{ $ciudade->name }}</option>
                                @endforeach
                            </select> {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 col-md-6">
                            <label class="form-label">{{ __('message.Latitude') }}</label>
                            <input class="form-control {{ ($errors->has('latitud') ? ' is-invalid' : '') }}" type="text" id="latitud" name="latitud" value="{{$product->latitud}}" placeholder="{{ __('message.Latitude') }}">
                            {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">{{ __('message.Longitude') }}</label>
                            <input class="form-control {{ ($errors->has('longitud') ? ' is-invalid' : '') }}" type="text" id="longitud" name="longitud" value="{{$product->longitud}}" placeholder="{{ __('message.Longitude') }}">
                            {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-12 my-2">
                            <label class="form-label">{{ __('message.Address') }}</label>
                            <div class="input-group">
                                <input class="form-control {{ ($errors->has('direccion') ? ' is-invalid' : '') }}" type="text" name="direccion" value="{{$product->direccion}}" placeholder="{{ __('message.Address') }}">
                            </div>
                            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>





                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary" type="submit" class="form-submit">
                    {{__('message.Save')}}
                </button>
            </div>
    </form>






    <!-- Gallery End -->
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Select dependiente de municipio, hereda de estado
    $(function() {
        $('#paisSelect').on('change', onSelectProjectChange);
    });

    function onSelectProjectChange() {
        var project_id = $(this).val();
        console.log(project_id);
        if (!project_id)
            $('#estadoSelect').html(html_select);
        $.get('/pais/' + project_id + '/estado', function(data) {
            var html_select = '<option value="">Seleccione un estado</option>'
            for (var i = 0; i < data.length; ++i)
                html_select += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
            $('#estadoSelect').html(html_select);
            console.log(html_select);
            console.log($('#estadoSelect').html(html_select));
        });

    }

    $(function() {
        $('#estadoSelect').on('change', onSelectProjectChanges);
    });

    function onSelectProjectChanges() {
        var project_id2 = $(this).val();
        console.log(project_id2);
        if (!project_id2)
            $('#ciudadSelect').html(html_select2);
        $.get('/estado/' + project_id2 + '/ciudad', function(data) {
            var html_select2 = '<option value="">Seleccione una ciudad</option>'
            for (var a = 0; a < data.length; ++a)
                html_select2 += '<option value="' + data[a].id + '">' + data[a].name + '</option>';
            $('#ciudadSelect').html(html_select2);
            console.log(html_select2);
            console.log($('#ciudadSelect').html(html_select2));
        });

    }
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertMedia'],
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#details'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertMedia'],
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection