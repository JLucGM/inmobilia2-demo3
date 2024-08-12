@php
$html_tag_data = [];
$title = __('message.Create page');
$description= __('message.Create page');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@section('content')

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <h2 class="card-title">{{$title}}</h2>

            <form method="POST" action="{{ route('pages.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                @include('page.form')

            </form>
        </div>
    </div>
</section>
@endsection