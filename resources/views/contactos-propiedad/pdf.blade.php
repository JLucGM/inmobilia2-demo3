<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product->name.' | '.$setting->name}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<style>
    .img {
        width: 200px;
        height: 150px;
    }


    .no-overflow {
        /*Evita que el contenido se salga del contenedor*/
        overflow: hidden;
    }

    .text-end {
    text-align: right!important;
}
</style>

<body class="no-overflow">
    <table class="table table-borderless border-bottom pb-4">
        <tbody>
            <tr>
                <td class="m-0 p-0">
                    <img src="{{ asset('image/' . $setting->logo_empresa_footer) }}" alt="{{$setting->name}}" class="logo" width="auto" height="50px" />
                </td>

                <td class="m-0 p-0 text-end">
                    <p class="m-0 p-0">{{$agente->name}}</p>
                    <p class="m-0 p-0">{{$agente->whatsapp}}</p>
                    <p class="m-0 p-0">{{$agente->email}}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="container-fluid">

        <div class="d-block">
            <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="" style="height: 400px; width:auto; background-size: cover;" alt="Imagen de la propiedad">
        </div>

        <div class="d-block mt-5">
            @foreach($images as $index => $image)
            <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $image->name) }}" class="img">
            @endforeach
        </div>

        <div class="row">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="m-0 p-0" scope="col">
                            <h4 class="fw-bold ">{{$product->name}}</h4>
                        </th>
                    </tr>
                    <tr>
                        <td class="m-0 p-0 ">
                            <p class="mb-0">{{__('message.Description')}}: {!! $product->description !!}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="m-0 p-0 ">
                            @if ($product->publicarPrecio == 1)
                            <p class="mb-0">{{__('message.Price')}}: {{ $setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}} </p>
                            @else
                            <p class="mb-0 fw-bold">{{__('message.Request price')}}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="m-0 p-0 ">
                            <p class="mb-0">{{__('message.Address')}}: {{$product->direccion}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h4 class="fw-bold">{{__('message.Size')}}</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="">
                            <p class="mb-0 fw-bold">{{__('message.Bedrooms')}}: {{$product->dormitorios}}</p>
                        </td>
                        <td class="">
                            <p class="mb-0 fw-bold">{{__('message.Bathrooms')}}: {{$product->toilet}}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-bold">{{__('message.built')}}: {{$product->metrosCuadradosC}}{{__('message.mts')}}<sup>2</sup></p>
                        </td>
                        <td>
                            <p class="mb-0 fw-bold">{{__('message.totals')}}: {{$product->metrosCuadradosT}}{{__('message.mts')}}<sup>2</sup></p>
                        </td>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h4 class="fw-bold">{{__('message.Details')}}</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="">
                            <p class="mb-0">{{__('message.Type of property')}}: {{ __('message.' . strtolower($product->tipopropiedad->nombre)) }}</p>
                        </td>
                        <td>
                            <p class="mb-0">{{__('message.Garage')}}: {{$product->cocheras}}</p>
                        </td>
                        <td>
                            <p class="mb-0">{{__('message.physical state')}}: {{ __('message.' . strtolower($product->phyState->name)) }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mb-4">
                <h4 class="fw-bold">{{__('message.Amenities')}}</h4>
                <div class="row">
                    @foreach ($product->amenities as $ameniti)
                    <div class="">
                        <ul>
                            <li>{{ __('message.'.strtolower($ameniti->amenitiesCheck->name)) }}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>