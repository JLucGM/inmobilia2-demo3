@php
$html_tag_data = [];
$title = __('message.Edit category');
$description= __('message.Edit category');
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

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-12 mb-0">

            <h2>{{$title}}</h2>
            <h1 class="small-title">{{ __('message.info category') }}</h1>

            {!! Form::model($cat, ['route' => ['cat.update', $cat->id], 'method' => 'patch']) !!}
            {{ method_field('PATCH') }}
            @csrf
            <div class="card">
                <div class="card-body row">

                    <div class="row">
                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('name', __('message.Name'),['class'=>'mb-4']) }}
                            {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-sm-6 mt-5">
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" value="0" />
                                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ $cat->status == 1? 'checked' : '' }} />
                                <label class="form-check-label" for="status">{{__('message.Status')}}</label>
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