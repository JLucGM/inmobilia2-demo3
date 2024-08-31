@php
$html_tag_data = [];
$title = $post->name;
$description= $title
@endphp

@include('frontend.header')


<img src="{{ asset('img/posts/' . $post->img) }}" class="img-fluid banner-posts" alt="{{ $post->name }}">

<div class="container mt-2">

  <div class="text-center">
    <h2 class="p-3 m-0 fw-semibold">{{ $post->name }}</h2>
    <p class="text-secondary mb-0 px-3">{!! $post->extract !!}</p>
    <p class="mb-0 text-secondary">{{ $post->created_at->format('d/m/Y') }}</p>
  </div>

  <div class="row">
    <div class="col-lg-8 col-12">
      <div class="card border-0 mb-3 p-0 my-3">
        <div class="card-body">
          <div class="px-2">{!! $post->body !!}</div>
          <p class="mb-0 text-center fw-bold text-secondary border m-5 p-4">{{__('message.Author')}}: {{$post->user->name }}</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-12">

      <div class="my-3">
        <h6 class="fw-bold text-center">{{__('message.Recent posts')}}</h6>
        @foreach ($postsSide as $post)
        <div class="card my-1 border-0">
          <a href="{{ route('blog.show',$post) }}" class="card-title fw-bold link-secondary text-decoration-none">
            <div class="row">
              <div class="col-md-4 align-self-center">
                <img src="{{ asset('img/posts/' . $post->img) }}" class="img-fluid" alt="{{ $post->name }}" style="height: 100px!important;">
              </div>
              <div class="col-md-8 p-0">
                <div class="card-body">
                  <p class="mb-0 fs-7 text-secondary text-wrap">{{$post->name}}</p>
                  <p class="mb-0 fs-7 text-secondary">{{ $post->created_at->format('d/m/Y') }}</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>

      <h6 class="fw-bold text-center">{{__('message.Suggested properties')}}</h6>
      @foreach ($products as $product)
      <a href="{{route('producto.show', [$product->id])}}" class="card text-decoration-none p-0 border-0 rounded-4 my-1 positions-relative">
        <div class="card border-0 mb-3">
          <div class="row g-0">
            <div class="col-md-4 align-self-center" >
              <img style="height: 100px!important;" src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="img-fluid rounded-start" alt="{{$product->portada}}">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h6 class="card-title link-dark fw-bold fs-7 text-secondary text-wrap">{{ $product->name }}</h6>
              </div>
            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>

@include('frontend.footer')