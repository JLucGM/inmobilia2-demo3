@php
$html_tag_data = [];
$title = __('message.Create post');
$description= __('message.Create post');
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

            {!! Form::open(['route'=>'posts.store','autocomplete'=>'off','files'=>true]) !!}
            @include('posts.partials.form')

        </div>
    </div>
</div>
@endsection