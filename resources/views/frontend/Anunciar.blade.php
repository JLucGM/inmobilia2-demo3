@php
$html_tag_data = [];
$title = $setting->titleAnunciar;
$description= $title
@endphp

<?php $logoUrl = asset('img/' . $setting->portadaAnunciar); ?>


@include('frontend.header')

<div class="banner w-100 text-center text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),  url('{{$logoUrl}}');">
  <h3 class="pt-5 fw-bold">{{ __('message.' . strtolower($setting->titleAnunciar)) }}</h3>
</div>

<div class="container py-5">
  <div class="row ">
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-5">
      <p>{{ $message }}</p>
    </div>
    @elseif($message = Session::get('error'))
    <div class="alert alert-danger mt-5">
      <p>{{ $message }}</p>
    </div>
    @endif

    <div class="col-12 col-md-7 p-3">
      <h4 class="">{{__('message.Your luxury real estate experience')}}</h4>
      <p>{!! $setting->descriptionAnunciar !!}</p>

    </div>

    <div class="col-12 col-md-5 bg-secondary p-3" style="--bs-bg-opacity: .2;">
    <p>{{__('message.publish property')}}</p>
      <form method="POST" action="{{ route('store.user-contacto') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
          <input type="text" value="{{old('name')}}" class="form-control mb-2 {{ ($errors->has('name') ? ' is-invalid' : '') }}" name="name" placeholder="{{__('message.Name')}}">
          {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="mb-2">
          <input type="text" value="{{old('apellido')}}" class="form-control mb-2 {{ ($errors->has('apellido') ? ' is-invalid' : '') }}" name="apellido" placeholder="{{__('message.Last name')}}">
          {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-2">
          <input type="text" value="{{old('email')}}" class="form-control mb-2 {{ ($errors->has('email') ? ' is-invalid' : '') }}" name="email" placeholder="{{__('message.Email')}}">
          {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-2">
          <input type="text" value="{{old('telefonoContacto1')}}" class="form-control mb-2 {{ ($errors->has('telefonoContacto1') ? ' is-invalid' : '') }}" name="telefonoContacto1" placeholder="{{__('message.Phone')}}">
          {!! $errors->first('telefonoContacto1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-2">
          <textarea name="observaciones" id="" placeholder="{{__('message.How can we help you?')}}" rows="5" class="form-control mb-2 {{ ($errors->has('observaciones') ? ' is-invalid' : '') }}">{{old('observaciones')}}</textarea>
          {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        {{--@if ($producto->usuarios->count() > 0)
                <input type="hidden" name="agente_id" value="{{ $producto->usuarios->first()->id }}" class="form-control mb-2" required>
        @endif--}}

        <button type="submit" class="btn btn-outline-secondary w-100 fw-bold">{{__('message.SEND')}}</button>
      </form>

    </div>
  </div>
</div>

@include('frontend.footer')