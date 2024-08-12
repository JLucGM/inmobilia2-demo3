@php
$html_tag_data = [];
$title = __('message.Create user') ;
$description= __('message.Create user')
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 ">
            <form action="{{ route('store.user') }}" method="post" enctype="multipart/form-data">
                <h2>{{$title}}</h2>
                <div class="d-flex justify-content-between mb-4">
                    <h1 class="small-title">{{ __('message.info user') }}</h1>
                </div>


                @csrf
                <div class="card">
                    <div class="card-body ">
                        <div class=" row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">{{__('message.Profile picture')}}</label>
                                    <input class="form-control" name="avatar" type="file" id="formFile">
                                    {!! $errors->first('avatar', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('name', __('message.Name'), ['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                                {{ Form::text('name',null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('last_name',__('message.Last name'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                                {{ Form::text('last_name',null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
                                {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>


                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('rol', __('message.Role'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                                <select class="form-control" name="rol">
                                    @foreach ($roles as $rol)
                                    <option value="{{$rol->name}}">{{$rol->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('email', __('message.Email'), ['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                                {{ Form::text('email',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('message.Email')]) }}
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('password', __('message.Password'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                                {{ Form::password('password',['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('message.Password')]) }}
                                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('whatsapp', __('message.Phone'), ['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                                {{ Form::text('whatsapp',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('message.Phone')]) }}
                                {!! $errors->first('whatsapp', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            {{--<div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('link_facebook','Facebook',['class'=>'form-label']) }}
                            {{ Form::text('link_facebook',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'link de facebook']) }}
                            {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('link_instagram','Instagram',['class'=>'form-label']) }}
                            {{ Form::text('link_instagram',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'whatsapp']) }}
                            {!! $errors->first('link_instagram', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('link_twitter','Twitter',['class'=>'form-label']) }}
                            {{ Form::text('link_twitter',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'whatsapp']) }}
                            {!! $errors->first('link_twitter', '<div class="invalid-feedback">:message</div>') !!}
                        </div>--}}

                        <div class="form-group col-sm-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input bg-secondarys" name="status" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{__('message.Status')}}</label>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection