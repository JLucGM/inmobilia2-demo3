@php
$html_tag_data = [];
$title = __('message.Create country') ;
$description= __('message.Create country');
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
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card">
                <div class="card-header">
                    <h2>{{$title}}</h2>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('popups.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('popup.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection