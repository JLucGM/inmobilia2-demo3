@php
$html_tag_data = [];
$title = __('message.edit status contact');
$description= __('message.edit status contact');
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

        <form method="POST" action="{{ route('status-contacts.update', $statusContact->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('status-contact.form')

        </form>
    </div>

</section>
@endsection