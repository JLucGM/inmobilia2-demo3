@php
$html_tag_data = [];
$title = __('message.Edit state');
$description= __('message.Edit state');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('content')
<section class="container-fluid">

    <div class="col-md-12">

        @includeif('partials.errors')

        <h2 class="card-title">{{$title}}</h2>

        <form method="POST" action="{{ route('estados.update', $estado->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('estado.form')

        </form>
    </div>
</section>
@endsection