@php
$html_tag_data = [];
$title = __('message.Edit city');
$description= __('message.Edit city');
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
        <div class="col-12 mb-0">

            <h2>{{$title}}</h2>
            <h1 class="small-title">{{ __('message.info city') }}</h1>

            {!! Form::model($city, ['route' => ['city.update', $city->id], 'method' => 'patch']) !!}

            {{ method_field('PATCH') }}
            @csrf
            <div class="card">
                <h1 class="success">{{$message}}</h1>

                <div class="card-body p-3">
                    <div class="row">
                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('name', __('message.Name'),['class'=>'form-label']) }}
                            {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="col-12 col-md-6">
                            {{ Form::label('estadoPerteneciente', __('message.State belonging'),['class'=>'form-label']) }}
                            <select class="form-control" name="estado_id" id="estado_id">
                                @foreach ($estados as $estado)
                                <option value="{{$estado->id}}" {{ isset($city->estados) && $estado->id == $city->estados->id ? 'selected' : '' }}>{{$estado->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-primary" type="submit" class="form-submit">{{ __('message.Save') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection