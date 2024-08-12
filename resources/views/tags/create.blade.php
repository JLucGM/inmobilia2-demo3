@php
$html_tag_data = [];
$title = __('message.Create tag');
$description= __('message.Create tag');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <h2>{{$title}}</h2>

            {!! Form::open(['route'=>'tags.store']) !!}

            @include('tags.partials.form')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection