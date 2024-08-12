@php
$html_tag_data = [];
$title = __('message.Create Amenity');
$description= __('message.Create Amenity')
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
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <h2 class="card-title">{{$title}}</h2>
            <h1 class="small-title">{{ __('message.info amenities') }}</h1>

            <form method="POST" action="{{ route('amenities-checks.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                @include('amenities-check.form')

            </form>
        </div>
    </div>
</section>
@endsection