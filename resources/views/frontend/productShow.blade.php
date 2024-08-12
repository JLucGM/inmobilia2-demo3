@php
$html_tag_data = [];
$title = $product->name;
$description= $title
@endphp

@include('frontend.header')

<div class="row">
  @if ($message = Session::get('success'))
  <div class="alert alert-success mt-5 text-center" style="z-index: 4">
    <p class="mb-0">{{ $message }}</p>
  </div>
  @elseif($message = Session::get('error'))
  <div class="alert alert-danger mt-5 text-center" style="z-index: 4">
    <p class="mb-0">{{ $message }}</p>
  </div>
  @endif
</div>

<div class="container bg-whites shadow-sms rounded-4s p-5s my-3">
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active fs-7" aria-current="page">
        @foreach($paises as $pais)
        @if($pais->id == $product->pais)
        {{$pais->name}}
        @break
        @endif
        @endforeach
      </li>
      <li class="breadcrumb-item active fs-7" aria-current="page">
        @foreach($estados as $estado)
        @if($estado->id == $product->region)
        {{$estado->name}}
        @break
        @endif
        @endforeach
      </li>
      <li class="breadcrumb-item active fs-7" aria-current="page">
        @foreach($ciudades as $ciudad)
        @if($ciudad->id == $product->ciudad)
        {{$ciudad->name}}
        @break
        @endif
        @endforeach
      </li>
    </ol>
  </nav>

  <div class="col-12 text-center">

    <h6 class="fw-bold ">{{$product->name}}</h6>
    <p class="text-secondary mb-0"><i class="fa-solid fa-location-dot"></i> {{$product->direccion}}</p>

    @if ($product->publicarPrecio == 1)
    <p class="mb-0 text-secondary">{{ $setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}} </p>
    @else
    <p class="mb-0 text-secondary fw-bold">{{__('message.Request price')}}</p>
    @endif

    <p class="fw-bold"><span class="text-secondary">{{ __('message.' . strtolower($product->typeBusiness->name)) }}</span></p>
  </div>
</div>

<div class="container">
  <div class="row">
    {{-- Seccion de propiedad --}}
    <div class="col-lg-8 col-xs-12 p-0 mb-3">

      <div id="myCarousel" class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
          @foreach($images as $image)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $image->name) }}" class="modal-cursor d-block w-100" alt="Slide {{ $loop->iteration }}">
          </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <div class="spandiv p-0">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </div>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <div class="spandiv">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </div>
        </a>
      </div>

      <div class="card bg-transparent border-0 shadow-sms rounded-4s">

        <div class="mb-4">
          <h6 class="fw-bold">{{__('message.Financing')}}</h6>
          <div class="row mb-4">
            <div class="col-12 text-center ">
              <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
                @if ($product->publicarPrecio == 1)
                <p class="mb-0 fw-bold">{{ $setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}} </p>
                <p class="mb-0">{{__('message.Price')}}</p>
                @else
                <p class="mb-0 text-secondary fw-bold text-capitalize">{{__('message.Request price')}}</p>
                @endif
              </div>
            </div>

            {{--<div class="col-6 text-center ">
              <div class=" bg-secondary py-2" style="--bs-bg-opacity: .3;">
                <p class="mb-0 fw-bold">{{$product->expensas}}</p>
            <p class="mb-0">{{__('message.Bills')}}</p>
          </div>
        </div>--}}
      </div>

      <h6 class="fw-bold">{{__('message.Size')}}</h6>
      <div class="row mb-4">
        <div class="col-6 text-center ">
          <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
            <p class="mb-0 fw-bold">{{$product->dormitorios}}</p>
            <p class="mb-0">{{__('message.Bedrooms')}}</p>
          </div>
        </div>

        <div class="col-6 text-center ">
          <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
            <p class="mb-0 fw-bold">{{$product->toilet}}</p>
            <p class="mb-0">{{__('message.Bathrooms')}}</p>
          </div>
        </div>
      </div>

      <h6 class="fw-bold">{{__('message.Details')}}</h6>
      <div class="row mb-4">
        <div class="col-4 col-md-2 mt-1 text-center">
          <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
            <p class="mb-0 fw-bold">{{ __('message.' . strtolower($product->tipopropiedad->nombre)) }}</p>
            <p class="mb-0">{{__('message.Type of property')}}</p>
          </div>
        </div>
        <div class="col-4 col-md-2 mt-1 text-center">
          <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
            <p class="mb-0 fw-bold">{{$product->cocheras}}</p>
            <p class="mb-0">{{__('message.Garage')}}</p>
          </div>
        </div>

        <div class="col-4 col-md-2 mt-1 text-center">
          <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
            <p class="mb-0 fw-bold">{{$product->metrosCuadradosC}}</p>
            <p class="mb-0">{{__('message.mts')}}<sup>2</sup> {{__('message.built')}}</p>
          </div>
        </div>

        <div class="col-4 col-md-2 mt-1 text-center">
          <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
            <p class="mb-0 fw-bold">{{$product->metrosCuadradosT}}</p>
            <p class="mb-0">{{__('message.mts')}}<sup>2</sup> {{__('message.totals')}}</p>
          </div>
        </div>
        <div class="col-4 col-md-2 mt-1 text-center">
          <div class="bg-secondary py-2" style="--bs-bg-opacity: .3;">
            <p class="mb-0 fw-bold">{{ __('message.' . strtolower($product->phyState->name)) }}</p>
            <p class="mb-0">{{__('message.physical state')}}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-4">
      <h6 class="fw-bold">{{__('message.Description')}}</h6>
      <p class="mb-0">{!! $product->description !!}</p>
    </div>

    <div class="mb-4">
      <h6 class="fw-bold">{{__('message.Amenities')}}</h6>
      <div class="row">
        @foreach ($product->amenities as $ameniti)
        <div class="col-3">
          <ul>
            <li>{{ __('message.'.strtolower($ameniti->amenitiesCheck->name)) }}</li>
          </ul>
        </div>
        @endforeach
      </div>
    </div>

    <div class="card bg-transparent border-0">
      <input type="hidden" name="latitud" id="latitud" value="{{$product->latitud}}">
      <input type="hidden" name="longitud" id="longitud" value="{{$product->longitud}}">
      <div id="mapa"> </div>
    </div>

  </div>
</div>

{{-- Seccion de agente --}}
<div class="col-lg-4 col-xs-12 ps-2 p-0 mb-3 ">
  @if ($producto->usuarios->count() > 0)
  <div class="container sticky-top z-1">
    <div class="bg-secondary border-0 shadow-sms rounded-4s" style="--bs-bg-opacity: .3;">
      <div class="row">
        <div class="text-center mt-3">
          <img src="{{ asset('img/profile/' . $product->agente->user->avatar) }}" alt="{{$product->agente->user->avatar}}" class="w-50 rounded">
          <h4>{{ $producto->usuarios->first()->name.' '.$producto->usuarios->first()->last_name }}</h4>
          <!-- <p class="text-primary mb-0">Agente</p> -->
        </div>

        <div class="col-12 p-5 pt-2">
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

                <input type="hidden" name="vendedorAgente_id" value="{{ $product->agente->user->id }}" class="form-control mb-2" required>

                <button type="submit" class="btn btn-outline-secondary w-100 fw-bold">{{__('message.SEND')}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
</div>
</div>

<div class="container-fluid">
  <div class="col-12 text-start py-4">
    <div class="col-12">
      <h6 class="text-capitalize fw-bold">{{__('message.Suggested properties')}}</h6>
    </div>
  </div>

  <div class="row">
    @foreach ($products as $product)
    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
      @include('frontend.components.productsComponent')
    </div>
    @endforeach
  </div>
</div>


{{-- Modal del carrousel de imagenes--}}
<div id="imageModal" class="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-body p-0 ">
        <img id="modalImage" src="" class="d-block w-100" alt="Modal Image">
      </div>
    </div>
  </div>
</div>

{{--<h1>Información del Producto</h1>
<p class="mb-0">Nombre del Producto: {{ $producto->name }}</p>

<h2>Usuario Asignado</h2>
@if ($producto->usuarios->count() > 0)
<p class="mb-0">Nombre del Usuario: {{ $producto->usuarios->first()->name }}</p>
<p class="mb-0">id del Usuario: {{ $producto->usuarios->first()->id }}</p>
@else
<p class="mb-0">No hay usuario asignado a este producto.</p>
@endif--}}


{{-- script map --}}

<script>
  function initmap() {
    var latitud = document.getElementById('latitud').value;
    var longitud = document.getElementById('longitud').value;
    // console.log(latitud);
    // console.log(longitud);

    var coord = {
      lat: parseFloat(latitud),
      lng: parseFloat(longitud)
    };
    console.log(coord);
    var map = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    })
  };
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=initmap"></script>


{{--<script>
  const option1 = document.getElementById('option1')
  const option2 = document.getElementById('option2')
  const content1 = document.getElementById('content1')
  const content2 = document.getElementById('content2')

  let chose = 1

  const changeOption = () => {
    chose == 1 ? (
        option1.classList.value = 'option option-active',
        content1.classList.value = 'content content-active'
      ) :
      (
        option1.classList.value = 'option',
        content1.classList.value = 'content'
      )

    chose == 2 ? (
      option2.classList.value = 'option option-active',
      content2.classList.value = 'content content-active'
    ) : (
      option2.classList.value = 'option',
      content2.classList.value = 'content'
    )
  }

  option1.addEventListener('click', () => {
    chose = 1
    changeOption()
  })

  option2.addEventListener('click', () => {
    chose = 2
    changeOption()
  })
</script>--}}

{{--CAROUSEL MODAL--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $('#myCarousel .carousel-item img').on('click', function() {
    var imageSrc = $(this).attr('src');
    $('#modalImage').attr('src', imageSrc);
    $('#imageModal').modal('show');
  });
</script>

@include('frontend.footer')