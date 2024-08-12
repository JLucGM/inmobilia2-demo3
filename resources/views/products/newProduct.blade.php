@php
$html_tag_data = [];
$title = __('message.Create property');
$description= $title
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')

<!-- Title and Top Buttons Start -->
<!-- Customers List Start -->
<div class="container">

    <h1>{{$title}}</h1>

    <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="small-title">{{ __('message.info property') }}</h1>
        </div>
        @csrf

        <div class="row">
            <div class="col-12 col-lg-8">
                <h1 class="my-3 small-title">{{ __('message.Property Information') }}</h1>
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Name') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('name') ? ' is-invalid' : '') }}" type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('message.Name') }}">
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4 mb-4">
                                <label class="form-label">{{ __('message.Type of property') }}</label>
                                <select class="form-control" name="tipoPropiedad_id" id="t_propiedades">
                                    @foreach ($tipoPropiedad as $item)
                                    <option value="{{ $item->id }}" {{ old('tipoPropiedad_id') == $item->id ? 'selected' : '' }}>
                                        {{ __('message.' . strtolower($item->nombre)) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-4 mb-4">
                                <label class="form-label">{{ __('message.physical state') }}</label>
                                <select class="form-control" name="phy_state_id">
                                    @foreach ($phystates as $phystate)
                                    <option value="{{$phystate->id}}" {{ old('phy_state_id') == $phystate->id ? 'selected' : '' }}>{{ __('message.' . strtolower($phystate->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-4 mb-4">
                                <label class="form-label">{{ __('message.business types') }}</label>
                                <select class="form-control" name="type_business_id">
                                    @foreach ($typebusinesses as $typebusiness)
                                    <option value="{{$typebusiness->id}}" {{ old('type_business_id') == $typebusiness->id ? 'selected' : '' }}>{{ __('message.' . strtolower($typebusiness->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">{{ __('message.Price') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('price') ? ' is-invalid' : '') }}" type="number" name="price" value="{{ old('price') }}" placeholder="{{ __('message.Price') }}">
                                {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            @if(auth()->user()->roles->contains('name', 'super Admin') || auth()->user()->roles->contains('name', 'admin'))
                            <div class="form-group col-md-6 mb-4">
                                {{ Form::label('agenteVendedor_id', __('message.Assign real estate agent') , ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                                {{ Form::select('agenteVendedor_id', $asignado, old('agenteVendedor_id'), ['class' => 'form-control' . ($errors->has('agenteVendedor_id') ? ' is-invalid' : ''), 'placeholder' => __('message.Assign real estate agent')]) }}
                                {!! $errors->first('agenteVendedor_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            @else()
                            <input type="text" value="{{auth()->user()->id}}" name="agenteVendedor_id" hidden>
                            @endif

                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Description') }}</label><label class="text-danger" for="">* </label>
                                <textarea class="form-control {{ ($errors->has('description') ? ' is-invalid' : '') }}" id="description" type="text" name="description" placeholder="{{ __('message.Description') }}">{{ old('description') }}</textarea>
                                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Stand out?') }}</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="destacado" value="1" id="inputDestacado" {{ old('destacado') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inputDestacado">{{ __('message.Yes') }}</label>
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Publish the property') }}</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="publicar" value="1" id="inputPublicar" {{ old('publicar') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inputPublicar">{{ __('message.Yes') }}</label>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Publish price?') }}
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="publicarPrecio" value="1" id="inputPublicar" {{ old('publicar') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inputPublicar">{{ __('message.Yes') }}</label>
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
                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Bedrooms') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('dormitorios') ? ' is-invalid' : '') }}" type="number" name="dormitorios" value="{{ old('dormitorios') }}" placeholder="{{ __('message.Bedrooms') }}">
                                {!! $errors->first('dormitorios', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Garage') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('cocheras') ? ' is-invalid' : '') }}" type="number" name="cocheras" value="{{ old('cocheras') }}" placeholder="{{ __('message.Garage') }}">
                                {!! $errors->first('cocheras', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.Bathrooms') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('toilet') ? ' is-invalid' : '') }}" type="number" name="toilet" value="{{ old('toilet') }}" placeholder="{{ __('message.Bathrooms') }}">
                                {!! $errors->first('toilet', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.mts') }}<sup>2</sup> {{ __('message.totals') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('metrosCuadradosT') ? ' is-invalid' : '') }}" type="number" name="metrosCuadradosT" value="{{ old('metrosCuadradosT') }}" placeholder="{{ __('message.Total M2') }}">
                                {!! $errors->first('metrosCuadradosT', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">{{ __('message.mts') }}<sup>2</sup> {{ __('message.covered') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('metrosCuadradosC') ? ' is-invalid' : '') }}" type="number" name="metrosCuadradosC" value="{{ old('metrosCuadradosC') }}" placeholder="{{ __('message.Mts2 Covered') }}">
                                {!! $errors->first('metrosCuadradosC', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12-col-md-6">
                    <h1 class="my-3 small-title">{{ __('message.Images') }}</h1>
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label" for="portada">{{ __('message.Upload cover') }}</label><label class="text-danger" for="">* </label>
                                <input type="file" class="form-control {{ ($errors->has('portada') ? ' is-invalid' : '') }}" name="portada" label="portada" id="portada" value="{{ old('portada') }}">
                                {!! $errors->first('portada', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="image">{{ __('message.Upload gallery') }}</label><label class="text-danger" for="">* </label>
                                <input type="file" class="form-control {{ ($errors->has('image') ? ' is-invalid' : '') }}" name="image[]" label="image" id="image" multiple value="{{ old('image') }}">
                                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12">

                <h1 class="my-3 small-title">{{ __('message.Amenities') }}<label class="text-danger" for="">* </label></h1>

                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <div class="row">

                                @foreach ($amenitiesCheck as $am)
                                <div class="col-6">
                                    <input type="checkbox" name="comodidades[]" class="form-check-input" id="{{$am->id}}" value="{{$am->id}}" {{ in_array($am->id, old('comodidades', []))? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{$am->id}}">
                                        {{ __('message.'.strtolower($am->name)) }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            {!! $errors->first('comodidades', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <h1 class="my-3 small-title">{{ __('message.Property Location') }}</h1>

                <div class="card">
                    <div class="card-body">

                        <div class="row mt-2">
                            <div class="form-group col-12 col-md-4 mb-4">
                                {{ Form::label('pais', __('message.Country'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                                <select class="form-control {{ ($errors->has('pais') ? ' is-invalid' : '') }}" name="pais" id="paisSelect">
                                    <option value="" selected>{{ __('message.Select a country') }}</option>
                                    @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}" {{ old('pais') == $pais->id ? 'selected' : '' }}>{{ $pais->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group col-12 col-md-4 mb-4">
                                {{ Form::label('region', __('message.State'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                                <select class="form-control {{ ($errors->has('region')? 'is-invalid' : '') }}" id="estadoSelect" name="region">
                                    <option value="" selected>{{ __('message.Select a state') }}</option>
                                    @if(old('region'))
                                    @php
                                    $estado = App\Models\Estado::find(old('region'));
                                    @endphp
                                    <option value="{{ old('region') }}" selected>{{ $estado->name }}</option>
                                    @endif
                                </select>
                                {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group col-12 col-md-4 mb-4">
                                {{ Form::label('ciudad', __('message.City'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                                <select class="form-control {{ ($errors->has('ciudad')? 'is-invalid' : '') }}" id="ciudadSelect" name="ciudad">
                                    <option value="" selected>{{ __('message.Select a city') }}</option>
                                    @if(old('ciudad'))
                                    @php
                                    $ciudad = App\Models\Ciudades::find(old('ciudad'));
                                    @endphp
                                    <option value="{{ old('ciudad') }}" selected>{{ $ciudad->name }}</option>
                                    @endif
                                </select>
                                {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="buscador my-2">
                            <label class="form-label">{{ __('message.Address') }}</label><label class="text-danger" for="">* </label>
                            <div class="input-group">
                                <input class="form-control {{ ($errors->has('direccion') ? ' is-invalid' : '') }}" type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" placeholder="{{ __('message.Address') }}">
                                <button type="button" class="btn btn-outline-success" id="buscar">{{ __('message.Search') }}</button>
                            </div>
                            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                            <div class="form-text">{{ __('message.Press "Search" to locate your address on the map') }}.</div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ __('message.Latitude') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('latitud') ? ' is-invalid' : '') }}" type="text" id="latitud" name="latitud" value="{{ old('latitud') }}" placeholder="{{ __('message.Latitude') }}">
                                {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ __('message.Longitude') }}</label><label class="text-danger" for="">* </label>
                                <input class="form-control {{ ($errors->has('longitud') ? ' is-invalid' : '') }}" type="text" id="longitud" name="longitud" value="{{ old('longitud') }}" placeholder="{{ __('message.Longitude') }}">
                                {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>


                        <div id="map" class="col-12" style="height: 500px; width: 100%;"> </div>
                    </div>
                </div>
            </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">{{ __('message.Save')}}</button>
            </div>

    </form>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Select dependiente de municipio, hereda de estado{{ __('message.Select a city') }}
    $(function() {
        $('#paisSelect').on('change', onSelectProjectChange);
    });

    function onSelectProjectChange() {
        var project_id = $(this).val();
        var selectStateText = '{{ __("message.Select a state") }}';


        console.log(project_id);
        if (!project_id)
            $('#estadoSelect').html(html_select);
        $.get('pais/' + project_id + '/estado', function(data) {
            var html_select = '<option value="">' + selectStateText + '</option>'; // Ahora la variable está disponible aquí
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
        var selectCityText = '{{ __("message.Select a city") }}';
        console.log(project_id2);
        if (!project_id2)
            $('#ciudadSelect').html(html_select2);
        $.get('estado/' + project_id2 + '/ciudad', function(data) {
            var html_select2 = '<option value="">' + selectCityText + '</option>'
            for (var a = 0; a < data.length; ++a)
                html_select2 += '<option value="' + data[a].id + '">' + data[a].name + '</option>';
            $('#ciudadSelect').html(html_select2);
            console.log(html_select2);
            console.log($('#ciudadSelect').html(html_select2));
        });

    }
</script>

<!-- MAPA -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2zAA0lz2WIp9qYBZd671LqbUaFok9LMc&callback=initMap" async defer></script>

<!-- Customers List End -->
<script>
    var map;
    let selectValor;
    var p;

    function initMap() {
        // const coords = { lat: 20.5866641, lng: -100.3863976 };  
        let lat = 20.5866641;
        let lng = -100.3863976;
        let coords = {
            lat: lat,
            lng: lng
        };

        map = new google.maps.Map(document.getElementById("map"), {
            center: coords,
            zoom: 15,
        });

        let infoWindow = new google.maps.InfoWindow({
            content: "Clic en el mapa para ubicar la propiedad.",
            position: coords,
        });
        infoWindow.open(map);
        map.addListener("click", (mapsMouseEvent) => {
            // marker.setMap(null);
            infoWindow.close();
            infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
            });
            $("#latitud").val(mapsMouseEvent.latLng.lat());
            $("#longitud").val(mapsMouseEvent.latLng.lng());
            // $("#alt").val(15);
            // infoWindow.setContent(
            //     "Ubicar propiedad aquí."
            // );
            // infoWindow.open(map);

            // Marcador de google

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {
                    lat: mapsMouseEvent.latLng.lat(),
                    lng: mapsMouseEvent.latLng.lng()
                }
            });
        });


        function localizar(elemento, direccion) {


            var geocoder = new google.maps.Geocoder();

            var map = new google.maps.Map(document.getElementById(elemento), {
                zoom: 16,
                scrollwheel: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            geocoder.geocode({
                'address': direccion
            }, function(results, status) {
                if (status === 'OK') {
                    var resultados = results[0].geometry.location,
                        resultados_lat = resultados.lat(),
                        resultados_long = resultados.lng();

                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    var mensajeError = "";
                    if (status === "ZERO_RESULTS") {
                        mensajeError = "No hubo resultados para la dirección ingresada.";
                    } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
                        mensajeError = "Error general del mapa.";
                    } else if (status === "INVALID_REQUEST") {
                        mensajeError = "Error de la web. Contacte con Name Agency.";
                    }
                    alert(mensajeError);
                }
            });



            infoWindow.open(map);
            map.addListener("click", (mapsMouseEvent) => {
                // console.log("entro");
                infoWindow.close();
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                $("#latitud").val(mapsMouseEvent.latLng.lat());
                $("#longitud").val(mapsMouseEvent.latLng.lng());
                // $("#alt").val(15);
                // infoWindow.setContent(
                //     "Ubicar propiedad aquí."
                // );
                // infoWindow.open(map);

                // Marcador de google

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: {
                        lat: mapsMouseEvent.latLng.lat(),
                        lng: mapsMouseEvent.latLng.lng()
                    }
                });
            });

        }

        let buscar = document.getElementById('buscar');
        let direccion = document.getElementById('direccion');

        buscar.addEventListener('click', () => {
            // console.log(direccion.value);
            localizar("map", direccion.value);
        });
    }
    // FINAL MAPS
</script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.comodidades').select2();
    });
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