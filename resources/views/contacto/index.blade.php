@php
$html_tag_data = [];
$title = __('message.Contact list');
$description= __('message.Contact list');
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
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h2>{{$title}}</h2>
                @can('admin.contactos.create')
                <a href="{{ route('contactos.create') }}" class="btn btn-outline-primary btn-sm ">{{ __('message.Create')}}</a>
                @endcan
            </div>

            <div class="card">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>{{ __('message.No')}}</th>
                                    <th style="width: 80px;">{{ __('message.Name')}}</th>
                                    <th>{{ __('message.Phone')}}</th>
                                    <th>{{ __('message.Email')}}</th>
                                    @if(auth()->user()->hasRole('super Admin'))
                                    <th>Agente</th>
                                    @endif
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactos as $contacto)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $contacto->name.' '. $contacto->apellido }}</td>
                                    <td>{{ $contacto->telefonoContacto1 }} </br> {{ $contacto->telefonoContacto2 }}</td>
                                    <td>{{ $contacto->email }}</td>

                                    @if(auth()->user()->hasRole('super Admin'))
                                    <td>
                                        @if($contacto->vendedorAgente)
                                        {{ $contacto->vendedorAgente->name }}
                                        @else
                                        <span class="badge bg-danger"> {{ __('message.Not assigned')}}</span>
                                        @endif
                                    </td>
                                    @endif
                                    <td class="text-end">
                                        <form action="{{ route('contactos.destroy',$contacto->id) }}" method="POST">
                                            @can('admin.contactos.create')
                                            <a class="btn btn-sm btn-outline-primary d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Contact information')}}" href="{{ route('contactos.show',$contacto->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>
                                            @endcan
                                            @can('admin.contactos.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Update contact')}}" href="{{ route('contactos.edit',$contacto->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>
                                            @endcan
                                            @can('admin.contactos.create')
                                            <a class="btn btn-sm btn-outline-warning d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.bind properties')}}" href="{{ route('contactos-propiedad.index',$contacto->id) }}"><i data-acorn-icon="home-garage" class="icon" data-acorn-size="10"></i></a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('admin.contactos.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.delete contact')}}"><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection