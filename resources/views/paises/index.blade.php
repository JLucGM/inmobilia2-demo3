@php
$html_tag_data = [];
$title = __('message.List of countries');
$description= __('message.List of countries');
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
            <div class="d-flex justify-content-between">
                <h2>{{$title}}</h2>

                @can('admin.paises.create')
                <a href="{{ route('paises.create') }}" class="btn btn-outline-primary btn-sm">
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
                                    <th>{{ __('message.Name') }}</th>
                                    <th class="text-end">{{ __('message.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paises as $pais)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $pais->name }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('paises.destroy',$pais->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('paises.show',$pais->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>--}}

                                            @csrf
                                            @method('DELETE')
                                            @can('admin.paises.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit country')}}" href="{{ route('paises.edit',$pais->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>
                                            @endcan
                                            @can('admin.paises.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.delete country')}}"><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
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
            {{--!! $paises->links() !!--}}
        </div>
    </div>
</div>
@endsection