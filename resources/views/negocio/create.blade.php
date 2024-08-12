@php
$html_tag_data = [];
$title = __('message.Create property business') ;
$description= __('message.Create property business') ;
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

        <h2 class="card-title">{{$title}}</h2>

        <form method="POST" action="{{ route('negocios.store') }}" role="form" enctype="multipart/form-data">
            @csrf

            @include('negocio.form')

        </form>
    </div>
</section>
@endsection