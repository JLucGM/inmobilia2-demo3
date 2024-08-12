@php
$html_tag_data = [];
$title = __('message.Edit slide');
$description= __('message.Edit slide');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <h2>{{$title}}</h2>

            <form method="POST" action="{{ route('slides.update', $slide->id) }}" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf

                @include('slide.form')

            </form>
        </div>
    </div>
</section>
@endsection