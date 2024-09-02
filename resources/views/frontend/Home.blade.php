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

        <div class="carousel-caption ">
          <div class="p-4 rounded" style="backdrop-filter: blur(10px); background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,0.3841911764705882) 37%, rgba(0,0,0,0.19091386554621848) 100%);">
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

<div class="container ">
  <div class="row">

    @foreach($typeBusinesses as $typeBusiness)
    <?php $image_url = asset('image/' . strtolower($typeBusiness->name) . '.png'); ?>

    <div class="col-12 col-lg-6">

      <a class="btn rounded-4 w-100 d-flex justify-content-center align-items-center my-4" href="{{ route('propiedad.lista', $typeBusiness->id) }} " style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{$image_url}}'); background-position: center center;
     background-repeat: no-repeat;
     background-size: cover; height:300px;">

        <p class="text-white fs-3 fw-bold">

          {{ __('message.' . strtolower($typeBusiness->name)) }}
        </p>

      </a>
    </div>

    @endforeach
  </div>
</div>

<div class="container">
  <!-- EQUIPO DE TRABAJO -->
  @if($setting->status_section_two == 1)
  @if(count($vendedorAgente) > 0)
  <div class="container my-5">
    <div class="row">
      <div class="col-12 text-center px-5">
        <h3 class="text-capitalize fw-bold">{{__('message.Our Agents')}}</h3>

      </div>
    </div>

    <div class="row">
      @foreach($vendedorAgente as $agente)
      <div class="col-lg-4 col-xl-3 col-md-6 col-sm-12">
        <div class="card border-0 card-agent shadow-sm">

          <img class="rounded-4 img-fluid card-img" alt="profile" src="{{asset('img/profile/'.$agente->avatar)}}" />

          <div class="card-img-overlay d-flex align-items-end " style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.05), rgba(0, 0, 0, 0.5)); background-size: 100%; background-position: 0% 100%;">
            <h4 class="text-center text-white d-flex align-items-end">{{ $agente->name.' '.$agente->last_name}}</h4>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif
  @endif
</div>

@if($setting->status_section_four == 1)
<div class="container-fluid  bg-secondary bg-gradient bg-opacity-25 py-5">
  <div class="row">

    <div class="col-12 col-lg-6">
      <div class="row justify-content-around">

        <div class="col-5 mt-5" style="height:450px; background-image: url(https://img.freepik.com/foto-gratis/primer-plano-silla-madera_1203-543.jpg?t=st=1723835664~exp=1723839264~hmac=cb7905fe03fd02d793afbfddc03d549679e38e8dea15278fc4758c9c3b815bf3&w=740); background-position: center center; background-repeat: no-repeat; background-size: cover;"></div>
        <div class="col-5" style="height:450px; background-image: url(https://img.freepik.com/foto-gratis/disparo-vertical-camino-hormigon-plantas-verdes-lados_181624-20818.jpg?t=st=1723835736~exp=1723839336~hmac=eba444cbd56983788acd8b8818612612bdce42018e875e9a941dabdc09c56a3c&w=360); background-position: center center; background-repeat: no-repeat; background-size: cover;"></div>
      </div>
    </div>
    <div class="col-12 col-lg-6 d-flex flex-column justify-content-center py-3 align-self-center">

      <h3 class="text-capitalize fw-bold text-cednter">{{ $info->title_anunciar  }}</h3>
      <p class="text-centefr">{{ $info->description_anunciar  }}</p>
      <div class="text-centerf">

        <a href="{{ route('propiedad.anunciar') }}" class="btn btn-outline-success ">Publicar propiedad</a>
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

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 ">
      @foreach ($testimonios as $t )

      <?php $image_url = asset('image/testimonio/' . $t->image); ?>

      <div class="col">
        <div class="card card-cover border-0 h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{$image_url}}'); background-position: center center; background-repeat: no-repeat; background-size: cover; height:350px;">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h6 class="pt-5 mt-5 mb-4 display-s6 lh-1 fw-bold">"{{ substr($t->testimonio, 0, 120) }}{{ strlen($t->testimonio) > 120? '...' : '' }}"</h6>
            <ul class="d-flex list-unstyled mt-auto">

              <li class="d-flex align-items-center me-3">
                <small>{{ $t->name }}</small>
              </li>

            </ul>
          </div>
        </div>
      </div>

      @endforeach
    </div>

  </div>
</div>
@endif
@endif
</div>

<!-- PORQUE ELEGIRNOS -->
@if($setting->status_section_one == 1)
<div class="container-fluid pt-5">
  <div class="row">
    <div class="col-12 text-center">
      <h3 class="text-capitalize fw-bold">{{ $info->title_info }}</h3>
      <p class="">{{ $info->select_us }}</p>
    </div>

    <div class="row">

      <div class="col-12 col-lg-6" style="height:450px; background-image: url(https://img.freepik.com/foto-gratis/edificio-apartamentos-ciudad-espacio-copia_23-2148814165.jpg?t=st=1723837700~exp=1723841300~hmac=0d83741127cbd422495ef3951ba0c1ff05f5d7b6dce59650adcbc9d605b4a5a9&w=826); background-position: center center; background-repeat: no-repeat; background-size: cover;"></div>
      <div class="col-12 col-lg-6">

        <div class="row py-4">
          <div class="col-12 p-3">
            <i class="text-secondar {{ $info->icon_first }} fs-1 p-0 m-0"></i>
            <h4 class="mt-4 text-secondar">{{ $info->title_first }}</h4>
            <p class="m-0 p-0 align-top text-secondary">{{ $info->sell_home }}</p>
          </div>

          <div class="col-12 p-3">
            <i class="text-secondar {{ $info->icon_second }} fs-1 p-0 m-0"></i>
            <h4 class="mt-4 text-secondar">{{ $info->title_second  }}</h4>
            <p class="m-0 p-0 align-top text-secondary">{{ $info->rent_home }}</p>
          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="row py-4">

          <div class="col-12 p-3">
            <i class="text-secondar {{ $info->icon_thrid }} fs-1 p-0 m-0"></i>
            <h4 class="mt-4 text-secondar">{{ $info->title_thrid  }}</h4>
            <p class="m-0 p-0 align-top text-secondary">{{ $info->buy_home }}</p>
          </div>

          <div class="col-12 p-3">
            <i class="text-secondar {{ $info->icon_fourth }} fs-1 p-0 m-0"></i>
            <h4 class="mt-4 text-secondar">{{ $info->title_fourth  }}</h4>
            <p class="m-0 p-0 align-top text-secondary">{{ $info->marketing_free }}</p>
          </div>

        </div>
      </div>
      <div class="col-12 col-lg-6" style="height:450px; background-image: url(https://img.freepik.com/foto-gratis/mantener-llaves-mano-al-aire-libre_23-2151015223.jpg?t=st=1723837656~exp=1723841256~hmac=f119dc9ccb18ac568cb2c52b4ea8747e7bac5edc1e3b40f48814e0f9ff19e0f7&w=900); background-position: center center; background-repeat: no-repeat; background-size: cover;"></div>
    </div>
  </div>
  
</div>
@endif

<div class="container-fluid py-5 text-center">
  <p class="my-5 text-secondary pt-">{{__('message.Entrust your property with our experts.')}} <a href="{{ route('contactacto.web') }}" class="link-secondary">{{__('message.Contact us')}}</a> {{__('message.today')}}.</p>
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