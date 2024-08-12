@php
$html_tag_data = [];
$title = __('message.Edit user') .': '.$user->name.' '.$user->last_name;
$description= __('message.Edit user')
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-0">
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

            {{ method_field('PATCH') }}
            @csrf
            <h2>{{$title}}</h2>
            <div class="d-flex justify-content-between mb-4">
                <h1 class="small-title">{{ __('message.info user') }}</h1>
            </div>

            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-thumbnail rounded-circle border-0 p-0" src="{{asset('img/profile/'.$user->avatar)}}" style="width:100px;" alt="">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">{{ __('message.Profile picture') }}</label>
                                <input class="form-control" name="avatar" type="file" id="formFile">
                            </div>
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('name', __('message.Name'),['class'=>'form-label']) }}
                            {{ Form::text('name',null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('last_name', __('message.Last name'),['class'=>'form-label']) }}
                            {{ Form::text('last_name',null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => __('message.Last name')]) }}
                            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('rol', __('message.Role'),['class'=>'form-label']) }}
                            <select class="form-control" name="rol" id="rol">
                                <option value="{{ $userRol }}" selected>{{ $userRol }}</option> <!-- Agregamos esta línea -->
                                @foreach ($roles as $rol)
                                <option value="{{$rol->name}}">{{$rol->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('email', __('message.Email'),['class'=>'form-label']) }}
                            {{ Form::text('email',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('message.Email')]) }}
                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('password', __('message.Password'),['class'=>'form-label']) }}
                            {{ Form::password('password',['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('message.Password')]) }}
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('whatsapp', __('message.Phone'),['class'=>'form-label']) }}
                            {{ Form::text('whatsapp',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('message.Phone')]) }}
                            {!! $errors->first('whatsapp', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input " name="status" type="checkbox" {{ $user->status ? 'checked' : ''  }} role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{__('message.Status')}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>
            </div>
        </div>
    </div>
</div>
@endsection