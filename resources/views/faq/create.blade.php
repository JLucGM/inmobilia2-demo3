@php
$html_tag_data = [];
$title = __('message.Create FAQS');
$description= __('message.Create FAQS');
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
        <div class="col-md-12">

            @includeif('partials.errors')

            <h2>{{$title}}</h2>

            <form method="POST" action="{{ route('faqs.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                @include('faq.form')

            </form>
        </div>
    </div>
</div>
@endsection