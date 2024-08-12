@php
$html_tag_data = [];
$title = __('message.Edit page');
$description= __('message.Edit page');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <h2>{{$title}}</h2>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <form method="POST" action="{{ route('pages.update', $page->id) }}" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf

                @include('page.form')
            </form>
        </div>
    </div>
</div>
@endsection