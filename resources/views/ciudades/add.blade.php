@php
$html_tag_data = [];
$title = __('message.Create city');
$description= __('message.Create city');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

{{--@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/customers.list.js"></script>
@endsection--}}



@section('content')
<div class="container-fluid">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 mb-0">

            <h2>{{$title}}</h2>
            <h1 class="small-title">{{ __('message.info city') }}</h1>

            <form action="{{ route('city.store') }}" method="post">
                <div class="card">
                    <div class="card-body">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('name', __('message.Name'),['class'=>'form-label']) }}
                                    {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                {{ Form::label('estadoPerteneciente', __('message.State belonging'),['class'=>'form-label']) }}
                                <select class="form-control" name="estado_id" id="estado_id">
                                    @foreach ($estados as $estado)
                                    <option value="{{$estado->id}}">{{$estado->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer mt-2">
                    <button class="btn btn-outline-primary" type="submit">{{__('message.Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection