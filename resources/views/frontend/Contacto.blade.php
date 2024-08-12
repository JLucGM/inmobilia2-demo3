@php
$html_tag_data = [];
$title = $setting->titleContact;
$description= $title
@endphp

<?php $logoUrl = asset('img/' . $setting->portadaContact); ?>

@include('frontend.header')

<div class="banner w-100 text-center text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),  url('{{$logoUrl}}');">
  <h3 class="pt-5 fw-bold">{{ __('message.' . strtolower($setting->titleContact)) }}</h3>
</div>

<div class="container ">

  <div class="row">
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-5">
      <p>{{ $message }}</p>
    </div>
    @elseif($message = Session::get('error'))
    <div class="alert alert-danger mt-5 ">
      <p class="text-center">{{ $message }}</p>
    </div>
    @endif
  </div>

  <div class="row my-5">
    <div class="col-12 col-md-7 p-3">
      <h4 class="">{{__('message.Your luxury real estate experience')}}</h4>
      <p>{!! $setting->descriptionContact !!}</p>
      <p>{{$setting->telefono}}</p>
      <p>{{$setting->email}}</p>
    </div>

    <div class="col-12 col-md-5 bg-secondary p-3" style="--bs-bg-opacity: .2;">
      <div class="text-start">
        <p>{{__('message.Contact us')}}</p>
      </div>
      <form method="POST" action="{{ route('store.user-contacto') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-12 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('name') ? ' is-invalid' : '') }}" name="name" placeholder="{{__('message.Name')}}">
              {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('apellido') ? ' is-invalid' : '') }}" name="apellido" placeholder="{{__('message.Last name')}}">
              {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="col-lg-12 col-sm-12  pt-2">
            <div class="form-group">
              <input type="email" class="form-control {{ ($errors->has('email') ? ' is-invalid' : '') }}" name="email" placeholder="{{__('message.Email')}}">
              {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('telefonoContacto1') ? ' is-invalid' : '') }}" name="telefonoContacto1" placeholder="{{__('message.Phone')}}">
              {!! $errors->first('telefonoContacto1', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          {{--<div class="col-lg-12 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('direccion') ? ' is-invalid' : '') }}" name="direccion" placeholder="{{__('message.Address of interest')}}">
              {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>--}}

          <div class="col-12  pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('observaciones') ? ' is-invalid' : '') }}" name="observaciones" id="text" placeholder="{{__('message.How can we help you?')}}">
              {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 my-3">
          <button type="submit" class="btn btn-outline-secondary">{{__('message.SEND')}}</button>
        </div>
      </form>
    </div>
  </div>
</div>

@include('frontend.footer')