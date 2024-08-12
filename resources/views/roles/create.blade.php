@php
$html_tag_data = [];
$title = __('message.Create role');
$description= __('message.Create role');
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
            @includeif('partials.errors')

            <h2>{{$title}}</h2>

            {!! Form::open(['route'=>'roles.store']) !!}
            @include('roles.form')

        </div>
    </div>
</div>
@endsection