@php
$html_tag_data = [];
$title = __('message.Create Testimonial');
$description= __('message.Create Testimonial');
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

        <h2 class="card-title">{{__('message.Create Testimonial')}}</h2>

        <form method="POST" action="{{ route('testimonios.store') }}" role="form" enctype="multipart/form-data">
            @csrf

            @include('testimonio.form')

        </form>
    </div>
</section>
@endsection