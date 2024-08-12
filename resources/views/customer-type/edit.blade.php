@php
$html_tag_data = [];
$title = __('message.edit customer types');
$description= __('message.edit customer types');
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

            <h2 class="card-title">{{$title}}</h2>

            <form method="POST" action="{{ route('customer-types.update', $customerType->id) }}" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf

                @include('customer-type.form')

            </form>
        </div>
    </div>
</section>
@endsection