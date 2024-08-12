@php
$html_tag_data = [];
$title = __('message.Blog');
$description= $title
@endphp

<?php $logoUrl = asset('img/' . $setting->portadaBlog); ?>

@include('frontend.header')

<div class="banner w-100 text-center text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),  url('{{$logoUrl}}');">
  <h3 class="pt-5 fw-bold">{{ $setting->titleBlog }}</h3>
</div>


<div class="container">

  <div class="px-5 py-5 text center">
    <p class="mb-0 text-secondary px-5">
      {!! $setting->descriptionBlog !!}
    </p>
  </div>

  <div class="row my-5">
    <div class="col-12">
      <div class="row d-md-flex ">
        @foreach ($posts as $post)
        <div class="col-12 col-sm-6 col-lg-3 mt-3">
          <div class="card border-0 rounded-0 shadow-sms">
            <div class="row g-0">
              <a class="btn rounded-0 p-0 m-0 border-0" href="{{ route('blog.show',$post) }}">
                <img src="{{ asset('img/posts/'.$post->img) }}" style="width: 100%; " class="card-img-top rounded-0" alt="{{$post->name}}">
              </a>
              <div class="card-body p-0">
                <a class="btn p-0" href="{{ route('blog.show',$post) }}">
                  <h6 class="fw-bold text-secondary">{{substr($post->name, 0, 70)}}{{ strlen($post->name) > 70? '...' : '' }}</h6>
                </a>
                {{--@foreach ($post->tags as $tag)
                <span class="badge rounded-pill ">ss{{$tag->name}}</span>
                @endforeach--}}

                {{--<p class="d-inline-block text-truncate">{!! $post->extract!!}</p>--}}
              </div>
              {{--<div class="card-footer bg-white d-flex justify-content-between fs-7">
                <div class="float-start">
                  <p class="mb-0 text-black"><i class="bi bi-pencil"></i> {{ $post->user->name }}</p>
              <p class="mb-0 text-black"><i class="bi bi-tag fs-6"></i> {{$post->category->name}}</p>
            </div>
            <div class="float-end">
              <p class="mb-0 text-black"><i class="bi bi-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</p>
            </div>
          </div>--}}
        </div>
      </div>
    </div>
    @endforeach
  </div>
  {!! $posts->links() !!}
</div>

</div>
<div class="row mb-5">
  @foreach ($products as $product )
  <div class="col-12 col-sm-12 col-md-12 col-lg-3">
    @include('frontend.components.productsComponent')
  </div>
  @endforeach
</div>

<div class="w-100 text-center">
  <p class="mb-0 text-secondary pt-">{{__('message.Entrust your property with our experts.')}}. <a href="{{ route('contactacto.web') }}" class="link-secondary">{{__('message.Contact us')}}</a> {{__('message.today')}}.</p>
</div>
</div>


@include('frontend.footer')