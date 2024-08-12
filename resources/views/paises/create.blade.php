@php
$html_tag_data = [];
$title = __('message.Create country') ;
$description= __('message.Create country');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<section class="container-fluid">
    <div class="col-md-12">

        @includeif('partials.errors')

        <h2>{{$title}}</h2>

        <form method="POST" action="{{ route('paises.store') }}" role="form" enctype="multipart/form-data">
            @csrf

            @include('paises.form')

        </form>
    </div>
</section>
@endsection