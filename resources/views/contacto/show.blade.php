@php
$html_tag_data = [];
$title = __('message.Contact information') ;
$description= __('message.Contact information');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <h2 id="card_title">{{$title}}</h2>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="my-3 small-title">{{ __('message.Main information') }}</h1>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.Name') }}:</strong>
                                        <p class="mb-0">{{ $contacto->name.' '. $contacto->apellido}}</p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.Origin') }}:</strong>
                                        <p class="mb-0">{{ $contacto->origins->name }}</p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.Status') }}:</strong>
                                        <p class="mb-0">{{ $contacto->statusContact->name }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.customer types') }}:</strong>
                                        <p class="mb-0">{{ $contacto->customerType->name }}</p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.birthdate') }}:</strong>
                                        <p class="mb-0">{{ $contacto->birthdate }}</p>
                                    </div>
                                </div>


                                <h1 class="my-3 small-title">{{ __('message.Contact information') }}</h1>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('message.Email') }}:</strong>
                                            <p class="mb-0">{{ $contacto->email }}</p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('message.First phone') }}:</strong>
                                            <p class="mb-0">{{ $contacto->telefonoContacto1 }}</p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('message.Second phone') }}:</strong>
                                            <p class="mb-0">{{ $contacto->telefonoContacto2 }}</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="row">
                                <h1 class="my-3 small-title">{{ __('message.Address') }}</h1>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.Country') }}:</strong>

                                        @foreach($paises as $pais)
                                        @if($pais->id == $contacto->pais)
                                        <p class="mb-0">{{$pais->name}}</p>
                                        @break
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.State') }}:</strong>
                                        @foreach($estados as $estado)
                                        @if($estado->id == $contacto->region)
                                        <p class="mb-0">{{$estado->name}}</p>
                                        @break
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.City') }}:</strong>
                                        @foreach($ciudades as $ciudad)
                                        @if($ciudad->id == $contacto->ciudad)
                                        <p class="mb-0">{{$ciudad->name}}</p>
                                        @break
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <strong>{{ __('message.Address') }}:</strong>
                                        <p class="mb-0">{{ $contacto->direccion }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h1 class="my-3 small-title">{{ __('message.customer demands') }}</h1>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <strong>{{ __('message.Type of property') }}:</strong>
                                        <p class="mb-0">{{ optional($contacto->tipoPropiedad)->nombre ?: 'Sin asignar' }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.min budget') }}:</strong>
                                        <p class="mb-0">{{ $contacto->min_budget }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.max budget') }}:</strong>
                                        <p class="mb-0">{{ $contacto->max_budget }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.min area') }}:</strong>
                                        <p class="mb-0">{{ $contacto->min_area }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.max area') }}:</strong>
                                        <p class="mb-0">{{ $contacto->max_area }}</p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.Bedrooms') }}:</strong>
                                        <p class="mb-0">{{ $contacto->bedrooms }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.Bathrooms') }}:</strong>
                                        <p class="mb-0">{{ $contacto->bathrooms }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <strong>{{ __('message.garage') }}:</strong>
                                        <p class="mb-0">{{ $contacto->garage }}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <strong>{{ __('message.Observations') }}:</strong>
                                        <p class="mb-0">{{ $contacto->observaciones }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection