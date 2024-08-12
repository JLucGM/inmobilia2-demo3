@php
$html_tag_data = [];
$title = ' ';
$description= $title
@endphp

@include('frontend.header')

@foreach ($pageShow as $page)
<?php $logoUrl = asset('../img/'. $page->portada); ?>

<div class="banner text-center text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),  url('{{$logoUrl}}');">
  <h3 class="pt-4">{{ $page->name }}</h3>
</div>

<div class="container">
  <div class="my-3 p-4">
    {!! $page->body !!}
  </div>
</div>

@endforeach

@include('frontend.footer')