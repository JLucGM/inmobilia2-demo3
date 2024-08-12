@php
$html_tag_data = [];
$title = __('message.Create state');
$description= __('message.Create state');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])


@section('content')
<section class="container-fluid">

    <div class="col-md-12">

        @includeif('partials.errors')

        <h2 class="card-title">{{$title}}</h2>

        <form method="POST" action="{{ route('estados.store') }}" role="form" enctype="multipart/form-data">
            @csrf

            @include('estado.form')

        </form>

    </div>
</section>
@endsection