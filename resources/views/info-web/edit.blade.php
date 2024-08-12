@php
$html_tag_data = [];
$title = __('message.Edit service information');
$description= __('message.Edit service information');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<!-- <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/products.list.js"></script> -->
@endsection

@section('content')
<section class="container-fluid">
    <div class="col-md-12">

        @includeif('partials.errors')

        <h2>{{$title}}</h2>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form method="POST" action="{{ route('info-webs.update', $infoWeb->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('info-web.form')

        </form>
    </div>
</section>
@endsection