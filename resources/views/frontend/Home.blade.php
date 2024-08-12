@php
$html_tag_data = [];
$title = __('message.Home');
$description= $title
@endphp

@include('frontend.header')

<!-- SLIDER -->
@if(count($slides) > 0)
<div class="container-fluid p-0">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner ">
      <div class="col-12 bg-dark position-absolute z-1" style="--bs-bg-opacity: .5;">
        @include('frontend.components.formSearch')
      </div>
      @foreach($slides as $slide)
      <div class="carousel-item {{ $loop->first? 'active' : '' }} ">
        @php
        $imagePath = asset('image/sliders/'.$slide->image);
        $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
        @endphp

        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
        <img src="{{ $imagePath }}" class="d-block w-100 img-fluido" alt="{{$slide->name}}">
        @elseif(in_array($extension, ['mp4', 'webm', 'ogg']))
        <video class="video-item d-block w-100" autoplay muted loop>
          <source class="video-item" src="{{ $imagePath }}" type="video/{{$extension}}">
          {{__('message.Your browser does not support videos.')}}
        </video>
        @endif

        <div class="carousel-caption carousel-captions ">
          <div class="p-4 rounded" style="background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,0.3841911764705882) 37%, rgba(0,0,0,0.19091386554621848) 100%);">
            <h5>{{ $slide->title }}</h5>
            <p>{{ $slide->texto }}</p>
            @if(!empty($slide->link))
            <a class="btn btn-light" href="{{ $slide->link }}" target="_blank">Ver mas</a>
            @endif
          </div>
        </div>

      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <div class="spandiv p-0">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </div>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <div class="spandiv">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </div>
    </button>
  </div>
</div>
@endif

@if(count($productsDestacados) > 0)
<!-- PROPIEDADES DESTACADAS -->
<div class="container my-4">
  <div class="row">
    <div class="col-12 text-start pb-4">
      <h4 class="text-capitalize fw-bold">{{__('message.Featured properties')}}</h4>
    </div>
  </div>

  <div class="row">
    @foreach ($productsDestacados as $product )
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <a href="{{route('producto.show', [$product->id])}}" class="card {{ $product->destacado == 1 ? 'shadow-lg' : '' }} text-decoration-none p-0 shadow-sml border rounded- my-1 position-relative">
        <div class="card text-bg-dark h-100">
          <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="card-img img-fluid h-100" alt="...">
          <div class="card-img-overlay">
            <div class="h-50">
              <h5 class="card-title ">{{ substr($product->name, 0, 45) }}{{ strlen($product->name) > 45? '...' : '' }}</h5>
              <p class="card-text fw-semibold mb-0 fs-7">{{ __('message.' . strtolower($product->tipopropiedad->nombre)) }}</p>
              <p class="card-text fw-semibold mb-0 fs-7">{{ __('message.' . strtolower($product->typeBusiness->name)) }}</p>
            </div>
            <p class="card-text pt-3"> {{ substr($product->direccion, 0, 80) }}{{ strlen($product->direccion) > 80? '...' : '' }} </p>
            <p class="card-text">
              @if ($product->publicarPrecio == 1)
              {{ $setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}}
              @else
            <p class="mb-0 card-text fw-bold text-capitalize">{{__('message.Request price')}}</p>
            @endif
            </p>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endif

@if(count($products) > 0)
<!-- PROPIEDADES RECIENTES -->
<div class="container my-4">
  <div class="row">
    <div class="col-12 text-start pb-4">
      <h4 class="text-capitalize fw-bold">{{__('message.Recent properties')}}</h4>
    </div>
  </div>

  <div class="row">
    @foreach ($products as $product)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
      @include('frontend.components.productsComponent')
    </div>
    @endforeach
  </div>
</div>
@endif

<div class="container">
  <!-- EQUIPO DE TRABAJO -->
  @if($setting->status_section_two == 1)
  @if(count($vendedorAgente) > 0)
  <div class="container my-5">
    <div class="row">
      <div class="col-12 text-center px-5">
        <h3 class="text-capitalize fw-bold">{{__('message.Our Agents')}}</h3>
        <p class="my-4">
          Estas son las últimas propiedades en la categoría Ventas. Puede
          crear la lista utilizando el "último código abreviado de listado" y
          mostrar elementos por categorías específicas.
        </p>
      </div>
    </div>

    <div class="row">
      @foreach($vendedorAgente as $agente)
      <div class="col-lg-4 col-xl-3 col-md-6 col-sm-12">
        <div class="card border-0 shadow-sm position-relative">

          <img class="rounded img-fluid" alt="profile" src="{{asset('img/profile/'.$agente->avatar)}}" />

          <div class="card-content py-2">
            <h4 class="text-center">{{ $agente->name.' '.$agente->last_name}}</h4>
            <h6 class="text-center">{{-- $agente->getRoleNames()[0] --}}</h6>
            <table class="table table-borderless mx-2">
              <tbody>
                <tr>
                  <th class="d-flex align-items-center"><i class="fa-solid fa-at me-2"></i>
                    <p class="m-0">{{ $agente->email }}</p>
                  </th>
                </tr>
                <tr>
                  <th class="d-flex"><i class="fa-solid fa-phone me-2"></i>
                    <p class="m-0">{{ $agente->whatsapp }}</p>
                  </th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif
  @endif


  @if($setting->status_section_four == 1)
  <div class="container rounded-4 bg-secondary bg-gradient bg-opacity-50 py-5">
    <div class="d-flex justify-content-center py-5">

      <div class="mx-auto">
        <h3 class="text-capitalize fw-bold text-center">{{ $info->title_anunciar  }}</h3>
        <p class="text-center">{{ $info->description_anunciar  }}</p>
        <div class="text-center">

          <a href="{{ route('propiedad.anunciar') }}" class="btn btn-outline-light ">Publicar propiedad</a>
        </div>
      </div>

    </div>
  </div>
  @endif

  @if($setting->status_section_three == 1)
  @if(count($testimonios) > 0)
  <div class="container my-4">
    <div class="row pb-4">
      <div class="col-12 text-center">
        <h3 class="text-capitalize fw-bold">{{__('message.Our Testimonials')}}</h3>
      </div>
    </div>

    <div class="row">
      @foreach ($testimonios as $t )
      <div class="col-lg-4 col-xl-3 col-md-6 col-sm-12">
        <div class="card shadow-sm border-0">
          <div class="card-content">
            <table class="table table-borderless m-0">
              <tbody>
                <tr>
                  <td class="text-center p-0">
                    <img src="{{ asset('image/testimonio/'.$t->image) }}" class="rounded img-fluid" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="font-normal m-0">{{ $t->name }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="font-normal m-0">"{{ substr($t->testimonio, 0, 120) }}{{ strlen($t->testimonio) > 120? '...' : '' }}"</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif
  @endif
</div>

<!-- PORQUE ELEGIRNOS -->
@if($setting->status_section_one == 1)
<div class="container pt-5">
  <div class="row">
    <div class="col-12 col-lg-6 py-5 ">
      <div class="row">
        <div class="col-12 text-center">
          <h3 class="text-capitalize fw-bold">{{ $info->title_info }}</h3>
          <p class="">{{ $info->select_us }}</p>
        </div>
        <div class="col-6 py-4">
          <i class="text-secondar {{ $info->icon_first }} fs-1 p-0 m-0"></i>
          <h4 class="mt- text-secondar">{{ $info->title_first }}</h4>
          <p class="m-0 p-0 align-top text-secondary">{{ $info->sell_home }}</p>
        </div>

        <div class="col-6 py-4">
          <i class="text-secondar {{ $info->icon_second }} fs-1 p-0 m-0"></i>
          <h4 class="mt- text-secondar">{{ $info->title_second  }}</h4>
          <p class="m-0 p-0 align-top text-secondary">{{ $info->rent_home }}</p>
        </div>

        <div class="col-6 py-4">
          <i class="text-secondar {{ $info->icon_thrid }} fs-1 p-0 m-0"></i>
          <h4 class="mt- text-secondar">{{ $info->title_thrid  }}</h4>
          <p class="m-0 p-0 align-top text-secondary">{{ $info->buy_home }}</p>
        </div>

        <div class="col-6 py-4">
          <i class="text-secondar {{ $info->icon_fourth }} fs-1 p-0 m-0"></i>
          <h4 class="mt- text-secondar">{{ $info->title_fourth  }}</h4>
          <p class="m-0 p-0 align-top text-secondary">{{ $info->marketing_free }}</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 py-5 d-none d-lg-block">
      <div class="bg-section-one rounded-2 h-100 w-100"></div>
    </div>
  </div>
</div>
@endif

<div class="w-100 text-center">
  <p class="mb-0 text-secondary pt-">{{__('message.Entrust your property with our experts.')}}. <a href="{{ route('contactacto.web') }}" class="link-secondary">{{__('message.Contact us')}}</a> {{__('message.today')}}.</p>
</div>


@include('frontend.footer')

{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  Swal.fire({
    title: 'Custom Popup',
    text: 'This is a custom popup in Laravel!',
    icon: 'success',
    confirmButtonText: 'Close'
  })
</script>--}}