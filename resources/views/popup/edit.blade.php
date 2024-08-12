@php
$html_tag_data = [];
$title = __('message.Edit country');
$description= __('message.Edit country');
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

            <div class="card card-default">
                <div class="card-header">
                    <h2>{{$title}}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('popups.update', $popup->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('popup.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection