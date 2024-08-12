@php
$html_tag_data = [];
$title = __('message.Update contact');
$description= __('message.Update contact');
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

        <form method="POST" action="{{ route('contactos.update', $contacto->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('contacto.form')

        </form>

    </div>
</section>
@endsection