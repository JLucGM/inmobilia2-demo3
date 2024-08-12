@php
$html_tag_data = [];
$title = __('message.bound contacts');
$description= __('message.bound contacts');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')


@endsection

@section('js_page')

@endsection

@section('content')

<div class="d-flex justify-content-between mb-4">
    <h1 class="card_title">{{$title}}</h1>
</div>

<div class="card">
    <div class="card-body">

        <table class="table" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">{{__('message.Contact')}}</th>
                    <th scope="col">{{__('message.Agent')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->contactos as $contacto)
                <tr>
                    <th>{{ $contacto->name. ' ' .$contacto->apellido }}</th>
                    <td> {{ $contacto->vendedorAgente->name. ' ' .$contacto->vendedorAgente->last_name }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection