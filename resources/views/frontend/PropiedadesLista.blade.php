@php
$html_tag_data = [];
$title = __('message.Properties');
$description= $title
@endphp
@include('frontend.header')


@include('frontend.components.formSearch')

<div class="container-fluid">
  <div class="row">

    <div class="col-12 col-md-6">

      <div class="row mb-3">
        @foreach ($products as $product )
        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
          @include('frontend.components.productsComponent')
        </div>
        @endforeach
      </div>
    </div>
    {{ $products->links() }}
    <div class="col-12 col-md-6" id="map"></div>

  </div>
</div>

<div class="col-12 col-md-6" id="map"></div>

@include('frontend.footer')

@if(count($products) > 0)
@include('frontend.functionmaps')
@endif