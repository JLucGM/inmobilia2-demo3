@php
$html_tag_data = [];
$title = __('message.FAQ');
$description= $title
@endphp
<?php $logoUrl = asset('img/' . $setting->portadaFaq); ?>

@include('frontend.header')


<div class="banner w-100 text-center text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),  url('{{$logoUrl}}');">
    <h3 class="pt-5 fw-bold">{{ __('message.' . strtolower($setting->titleFaq)) }}</h3>
</div>

<div class="mb-3 ">
    <div class="container bg-primery p-4 ">
        <div class="px-5 py-5 text center">
            <p class="mb-0 text-secondary px-5">
                {!! $setting->descriptionFaq !!}
            </p>
        </div>
        <div class="accordion rounded shadow-sm bg-white" id="accordionExample">
            @foreach($faqs as $faq)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{$faq->id}}" aria-expanded="true" aria-controls="{{$faq->id}}">
                        {{$faq->question}}
                    </button>
                </h2>
                <div id="{{$faq->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="mb-0">{{$faq->answer}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('frontend.footer')