@php
$html_tag_data = [];
$title = __('message.Properties') ;
$description= $title
@endphp

@include('frontend.header')



@include('frontend.components.formSearch')
{{--<div id="map" class="col-12" style="height: 500px; width: 100%;"> </div>--}}

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            @if (sizeof($productsSearch)>0)
            <div class="row">
                @foreach ($productsSearch->items() as $product )
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    @include('frontend.components.productsComponent')
                </div>
                @endforeach
            </div>
            {{ $productsSearch->appends(['searchQuery' => $searchQuery])->links() }}
            @else

            <div class="alert alert-danger mt-1">
                <p>{{__('message.Sorry, there are no properties that match your search.')}} </p>
            </div>

            <div class="row">
                @foreach ($products as $product )
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    @include('frontend.components.productsComponent')
                </div>
                @endforeach
            </div>

            {{ $products->appends(['searchQuery' => $searchQuery])->links() }}
            @endif

        </div>
        <div class="col-6" id="map" ></div>
    </div>
</div>

@if (sizeof($productsSearch) >0)
@include('frontend.functionmapsSearch')
@else
@include('frontend.functionmaps')
@endif

@include('frontend.footer')