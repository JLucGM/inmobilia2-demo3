@php
$html_tag_data = [];
$title = __('message.Property Business List');
$description= __('message.Property Business List');
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
        <div class="col-sm-12">
            <div class="card-header d-flex justify-content-between">
                <h2>{{$title}}</h2>
                @can('admin.negocios.create')
                <a href="{{ route('negocios.create') }}" class="btn btn-outline-primary btn-sm float-right" data-placement="left">
                    {{ __('message.Create') }}
                </a>
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
                                    <th>{{ __('message.No') }}</th>
                                    <th style="width: 80px;">{{ __('message.Name') }}</th>
                                    <th>{{ __('message.Total budget') }}</th>
                                    <th>{{ __('message.Contact') }}</th>
                                    <th>{{ __('message.Properties') }}</th>
                                    <th>{{ __('message.priority') }}</th>
                                    <th>{{ __('message.Agent') }}</th>
                                    <th class="text-end">{{ __('message.Action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($negocios as $negocio)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $negocio->name }}</td>
                                    <td>{{ number_format($negocio->budget, 2, ',', '.').' '.$SettingGeneral->moneda }}</td>
                                    <td>{{ $negocio->contacto->name.' '.$negocio->contacto->apellido }}</td>
                                    <td>{{ $negocio->product->name }}</td>
                                    <td>
                                        <span class="badge @if($negocio->priority_id == 1) bg-success @elseif($negocio->priority_id == 2) bg-warning @else bg-danger @endif"> {{ __('message.'. strtolower($negocio->priority->name)) }}
                                        </span>
                                    </td>
                                    <td>{{ $negocio->user->name.' '.$negocio->user->last_name }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('negocios.destroy',$negocio->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('negocios.show',$negocio->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            @can('admin.negocios.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit property business')}}" href="{{ route('negocios.edit',$negocio->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.negocios.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete property business')}}"><i class="fa fa-fw fa-trash"></i></button>
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