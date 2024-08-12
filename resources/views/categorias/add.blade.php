@php
$html_tag_data = [];
$title = __('message.create category');
$description= __('message.List of category');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <div class="row">
        <div class="col-12">

            <h2>{{$title}}</h2>
            <h1 class="small-title">{{ __('message.info category') }}</h1>

            <form action="{{ route('cat.store') }}" method="post">
                <div class="card">
                    <div class="card-body">
                        @csrf

                        <div class="row">

                            <div class="form-group col-12 col-md-6 mb-4">
                                {{ Form::label('name', __('message.Name'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                                {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group col-12 col-md-6 mt-5">
                                <div class="form-check form-switch">
                                    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
                                    {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input custom-switch', 'role' => 'witch'])!!}
                                    {!! Form::label('status', __('message.Status'), ['class' => 'form-check-label'])!!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer mt-2">
                    <button class="btn btn-outline-primary" type="submit">{{ __('message.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection