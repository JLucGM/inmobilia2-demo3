@php
$html_tag_data = [];
$title = __('message.Edit tag');
$description= __('message.Edit tag');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <h2>{{$title}}</h2>

            {!! Form::model($tag, ['route'=>['tags.update',$tag],'method'=>'put']) !!}

            @include('tags.partials.form')

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection







@push('page_scripts')

<script src="{{asset('plugins/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}">


</script>

<script>
    $(document).ready(function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>


@endpush