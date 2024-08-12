@php
$html_tag_data = [];
$title = __('message.Create task');
$description= __('message.Create task');
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
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')


            <h2>{{$title}}</h2>

            <form method="POST" action="{{ route('tasks.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                @include('task.form')

            </form>
        </div>
    </div>
</section>
@endsection