@php
$html_tag_data = [];
$title = __('message.Edit Testimonial');
$description= __('message.Edit Testimonial');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script>
@endsection

@section('content')
<section class=" container-fluid">
    <div class="col-md-12">

        @includeif('partials.errors')

        <h2 class="card-title">{{"Editar Testimonios"}}</h2>

        <form method="POST" action="{{ route('testimonios.update', $testimonio->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('testimonio.form')

        </form>
    </div>
</section>
@endsection