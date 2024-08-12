@php
$html_tag_data = [];
$title = __('message.Edit settings');
$description= __('message.Edit settings');
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

            <h2>{{$title}}</h2>

            <form method="POST" action="{{ route('setting-generals.update', $settingGeneral->id) }}" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf

                @include('setting-general.form')

            </form>
        </div>
    </div>
</section>
@endsection