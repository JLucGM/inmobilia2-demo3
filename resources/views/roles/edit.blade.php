@php
$html_tag_data = [];
$title = __('message.Edit role');
$description= __('message.Edit role');
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

            {!! Form::model($role,['route'=>['roles.update',$role],'method' => 'put']) !!}
            @include('roles.form')

        </div>
    </div>
</div>
@endsection