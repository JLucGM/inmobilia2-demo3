@php
$html_tag_data = [];
$title = __('message.Update Amenity Check');
$description= __('message.Update Amenity Check')
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

    <div class="col-md-12">

        @includeif('partials.errors')

        <h2 class="card-title">{{$title}}</h2>
        <h1 class="small-title">{{ __('message.info amenities') }}</h1>

        <form method="POST" action="{{ route('amenities-checks.update', $amenitiesCheck->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('amenities-check.form')

        </form>

    </div>
</section>
@endsection