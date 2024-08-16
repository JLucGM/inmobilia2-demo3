<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title.' | '.$setting->name}}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Link Swiper's CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <!-- <script src="{{asset('js/enable-push.js')}}"></script> -->
  <link rel="icon" type="image/x-icon" href="{{ asset('image/' . $setting->logo_empresa_favicon) }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body >
  <style>
    .list-header {

      background-color: #e7e7e8 !important;
    }

    .active {
      background-color: #e7e7e8 !important;
      border-color: #e7e7e8 !important;


    }

    /*.active::after {
      content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'%3E%3Cpath d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z'/%3E%3C/svg%3E");
      color: black;
      float: right;

    }*/

    .list-group-item {
      border: none;
    }
  </style>
  @php
  $locales = [
  'en'=> __('message.English'),
  'es'=> __('message.Spanish'),
  ];
  $selectedLocale = session('locale');

  @endphp
  <!-- <div class="d-flex justify-content-between px-5 pt-3">
    <div class="d-flex">
      <a class="btn fw-bold" href="#">
        <i class="bi bi-facebook"></i> </a>
      <a class="btn fw-bold" href="#">
        <i class="bi bi-twitter"></i>
      </a>
      <a class="btn fw-bold" href="#">
        <i class="bi bi-google"></i>
      </a>
    </div>

    <div>
      <a href="#" class="btn"><i class="fa-sharp fa-solid fa-phone"></i> 300-555-6789</a>
    </div>

  </div> -->

  <nav class="navbar navbar-expand-lg bg-white py-0 sticky-top" data-bs-theme="white" style="z-index: 2;">
    <div class="container-fluid px-5">

      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <a class="btn" href="{{ route('home') }}">
          <img src="{{ asset('image/' . $setting->logo_empresa) }}" alt="{{$setting->name}}" class="logo" width="auto" height="55px" />
        </a>
        <ul class="navbar-nav ms-auto mt-2 pb-2 mb-lg-0">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('home') }}">
              {{ __('message.Home')}}
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="businessTypeDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __('message.Properties')}}
            </a>
            <ul class="dropdown-menu">
              @foreach($typeBusinesses as $typeBusiness)
              <li>
                <a class="dropdown-item" href="{{ route('propiedad.lista', $typeBusiness->id) }}">
                  {{ __('message.' . strtolower($typeBusiness->name)) }}
                </a>
              </li>
              @endforeach
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('blog.index') }}">
              {{ __('message.Blog')}}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('faq.show') }}">
              {{ __('message.FAQ')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('contactacto.web') }}">
              {{ __('message.Contact')}}
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('propiedad.anunciar') }}" class="nav-link">{{ __('message.Publish')}}</a>
          </li>
          <li class="nav-item">
            @if(auth()->check())
            <!-- Mostrar ciertas cosas si el usuario está logueado -->
            <a href="{{route('Dashboard')}}" class="btn btn-outline-secondary border-0">{{ __('message.Dashboard')}}</a>
            @else
            <!-- Mostrar otras cosas si el usuario no está logueado -->
            <a href="{{route('login')}}" class="btn btn-outline-secondary border-0"><i class="bi bi-person-fill"></i></a>
            @endif
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-secondary border-0" data-bs-toggle="offcanvas" href="#offcanvasSetting" role="button" aria-controls="offcanvasSetting"><i class="bi bi-globe"></i></a>
          </li>
        </ul>



      </div>
    </div>
  </nav>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSetting" aria-labelledby="offcanvasSettingLabel">
    <div class="offcanvas-header bg-secondary">
      <h5 class="offcanvas-title text-white text-center" id="offcanvasSettingLabel">{{ __('message.Global settings')}}</h5>
      <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-secondary">
      <div class="container bg-white">
        <h6 class="text-center">{{ __('message.Language')}}</h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item list-header py-0 text-center">
          </li>
          @foreach($locales as $locale => $language)
          <li @if($selectedLocale==$locale) class="list-group-item py-0 active mx-3 my-1" @else class="list-group-item py-0 mx-3 my-1" @endif><a class="btn p-0 fs-7" href="{{ url('locale/'.$locale) }}">{{ $language }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>


  <script>
    //Hover del navegador
    $(document).ready(function() {
      $('.dropdown').on('mouseover', function() {
        $(this).addClass('show');
        $(this).find('.dropdown-menu').addClass('show');
      });

      $('.dropdown').on('mouseout', function() {
        $(this).removeClass('show');
        $(this).find('.dropdown-menu').removeClass('show');
      });
    });
  </script>

  {{--Muestra idioma seleccionado
  <script>
    function cambiarIdioma(select) {
      window.location.href = select.value;
    }
  </script>--}}