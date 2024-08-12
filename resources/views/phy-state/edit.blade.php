@php
$html_tag_data = [];
$title = __('message.Edit physical states');
$description= __('message.Edit physical states');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<section class="container-fluid">
    <div class="col-md-12">

        @includeif('partials.errors')

        <h2>{{$title}}</h2>

        <form method="POST" action="{{ route('phy-states.update', $phyState->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('phy-state.form')

        </form>
    </div>
</section>
@endsection