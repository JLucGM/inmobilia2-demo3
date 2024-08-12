@php
$html_tag_data = [];
$title = __('message.Create type business') ;
$description= __('message.Create physical state');
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

        <form method="POST" action="{{ route('type_business.store') }}" role="form" enctype="multipart/form-data">
            @csrf

            @include('type-business.form')

        </form>
    </div>

</section>
@endsection