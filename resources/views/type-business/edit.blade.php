@php
$html_tag_data = [];
$title = __('message.Edit type business');
$description= __('message.Edit type business');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<section class=" container-fluid">
    <div class="col-md-12">

        @includeif('partials.errors')

        <h2>{{$title}}</h2>


        <form method="POST" action="{{ route('type_business.update', $typeBusiness->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('type-business.form')

        </form>
    </div>
</section>
@endsection