@php
$html_tag_data = [];
$title = __('message.Contact tracking by property');
$description = __('message.Contact tracking by property');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')

@endsection


@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <h2 class="card_title">{{ $title }}</h2>
    <div class="d-flex justify-content-between">
        <h1 class="my-3 small-title">{{ __('message.Contact details') }}</h1>
        <div class="">

            @can('admin.contactos.edit')
            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="{{__('message.Update contact')}}" href="{{ route('contactos.edit',$contacto->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>
            @endcan
            @can('admin.tasks.create')
            <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary btn-sm float-right" data-placement="left">
                {{ __('message.Create task'); }}
            </a>
            @endcan
        </div>
    </div>
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
        </div>

        <div class="col-12 col-md-6">
            <div class="card mb-4">
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

            <div class="card">
                <div class="card-body">
                    <h1 class="my-3 small-title">{{ __('message.customer demands') }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <strong>{{ __('message.Type of property') }}:</strong>
                                <p class="mb-0">{{ $contacto->tipoPropiedad->nombre }}</p>
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


        <div class="d-flex justify-content-between my-4">
            <h2>{{ __('message.bound properties') }}</h2>
            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                {{ __('message.bind properties') }}
            </button>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">


        <table class="table table-striped table-hover" id="dataTable">
            <thead class="thead">
                <tr>
                    <th>{{ __('message.No')}}</th>
                    {{--<th>{{ __('message.Contact')}}</th>--}}
                    <th>{{ __('message.Front')}}</th>
                    <th>{{ __('message.Property of interest')}}</th>
                    <th>{{ __('message.Relationship type')}}</th>
                    <th>{{ __('message.Observations')}}</th>
                    <th class="text-end">Acciones</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($contactosPropiedads as $contactosPropiedad)
                <tr>
                    <td>{{ ++$i }}</td>
                    {{--<td>{{ $contactosPropiedad->contacto->name.' '.$contactosPropiedad->contacto->apellido }}</td>--}}
                    <td>
                        <img src="{{ asset('img/product/product_id_' . $contactosPropiedad->product->id . '/' . $contactosPropiedad->product->portada) }}" class="" style=" width: 70px; height:50px">
                    </td>
                    <td>{{ $contactosPropiedad->tipoRelacion }}</td>
                    <td>{{ $contactosPropiedad->product->name }}</td>
                    <td>{{ $contactosPropiedad->observaciones }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="{{__('message.property PDF')}}" target="_blank" href="{{ route('pdpreport.show',[$contactosPropiedad->product->id,$contactosPropiedad->contacto->vendedorAgente->id]) }}"><i class="fa-regular fa-file-pdf"></i></a>
                    </td>
                    {{--<td class="text-end">
                                            <form action="{{ route('contactos-propiedads.destroy',$contactosPropiedad->id) }}" method="POST">
                    <a class="btn btn-sm btn-primary " href="{{ route('contactos-propiedads.show',$contactosPropiedad->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>
                    <a class="btn btn-sm btn-success" href="{{ route('contactos-propiedads.edit',$contactosPropiedad->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Settings"><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
                    </form>
                    </td>--}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('message.bind properties') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('contactos-propiedads.store') }}" role="form" enctype="multipart/form-data">
                    @csrf

                    @include('contactos-propiedad.form')

                </form>
            </div>
        </div>
    </div>
</div>