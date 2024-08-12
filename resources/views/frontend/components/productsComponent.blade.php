
<a href="{{route('producto.show', [$product->id])}}" class="card text-decoration-none p-0 shadow-sml border rounded- my-1 position-relative">

  <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="card-img-top rounded-bottom" style="height: 210px; background-size: cover;" alt="Imagen de la propiedad">

  <div class="card-body py-2">
    <div class="" style="height: 6vh;">

      <h6 class="card-title text-secondary fw-bold">{{ substr($product->name, 0, 45) }}{{ strlen($product->name) > 45? '...' : '' }}</h6>
    </div>
    <p class="card-text text-secondary mb-0 fs-7" style="height: 45px;">
      {{ substr($product->direccion, 0, 80) }}{{ strlen($product->direccion) > 80? '...' : '' }}
    </p>
    <table class="table table-borderless p-0 m-0">
      <tbody>
        <tr>
          <td class="p-0">
            <p class="card-text text-secondary fw-semibold mb-0 fs-7">{{ __('message.' . strtolower($product->tipopropiedad->nombre)) }}</p>
          </td>
          <td class="p-0">
            <p class="card-text float-end text-secondary fw-semibold mb-0 fs-7">{{ __('message.' . strtolower($product->typeBusiness->name)) }}</p>
          </td>
        </tr>
      </tbody>
    </table>

    {{--<table class="table table-borderless mb-0">
      <tbody>
        <tr>
          <td>
            <p class="link-secondary mb-0 fs-7">{{ $product->dormitorios }} {{ __('message.Bedrooms')}}</p>
    </td>
    <td>
      <p class="link-secondary mb-0 fs-7">{{ $product->toilet }} {{ __('message.Bathrooms')}}</p>
    </td>
    </tr>
    <tr>
      <td>
        <p class="link-secondary mb-0 fs-7">{{ $product->metrosCuadradosT }} {{ __('message.mts')}}<sup>2</sup> totales</p>
      </td>
      <td>
        <p class="link-secondary mb-0 fs-7">{{ $product->cocheras }} {{ __('message.Parking')}}</p>
      </td>
    </tr>
    </tbody>
    </table>--}}
  </div>
  <div class="card-footer borde rounded-  px-3 py-1">
    @if ($product->publicarPrecio == 1)
    <p class="mb-0 text-secondary">{{ $setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}} </p>
    @else
    <p class="mb-0 text-secondary fw-bold text-capitalize">{{__('message.Request price')}}</p>
    @endif
  </div>
  @if ($product->destacado == 1)
  <div class="position-absolute top-10 start-90 translate-middle" style="z-index: 1;">
    <div class="bg-warning rounded p-2 ">
      <span class="text-black fs-7 fw-bold mb-0 text-wrap">{{__('message.FEATURED')}}</span>
    </div>
  </div>
  @endif
</a>
