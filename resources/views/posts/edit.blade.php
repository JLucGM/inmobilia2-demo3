@php
$html_tag_data = [];
$title = __('message.edit post');
$description= __('message.edit post');
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

            {!! Form::model($post,['route'=>['posts.update',$post],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}

            @include('posts.partials.form')

        </div>
    </div>
</div>
@endsection

@push('page_scripts')
@endpush