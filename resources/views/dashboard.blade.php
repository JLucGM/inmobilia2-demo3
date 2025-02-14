@php
$html_tag_data = [];
$title = __('message.Dashboard');
$description= 'Ecommerce Dashboard'
@endphp
@if(Auth()->check())
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])


@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/Chart.bundle.min.js"></script>
<script src="/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
<script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
<script src="/js/cs/charts.extend.js"></script>
<script src="/js/pages/dashboard.js"></script>

@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->


    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-12 col-md-7">
                <a class="muted-link pb-2 d-inline-block hidden" href="#">
                    <span class="align-middle lh-1 text-small">&nbsp;</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{__('message.Welcome')}}, {{$user->name.' '.$user->last_name}}</h1>
            </div>
            <!-- Title End -->
        </div>
    </div>

    <!-- Title and Top Buttons End -->

    <!-- Stats Start -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex">
                {{--<div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
                    <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <span class="small-title"></span>
                    </a>
                    <div class="dropdown-menu font-standard">
                        <div class="nav flex-column" role="tablist">
                            <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Weekly</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Monthly</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Yearly</a>
                        </div>
                    </div>
                </div> --}}
                <h2 class="small-title">{{__('message.Stats')}}</h2>
            </div>
            <div class="mb-5">
                <div class="row g-2">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="dollar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">{{__('message.CONTACTS')}}</div>
                                <div class="text-primary cta-4">{{$contactocount}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="cart" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">{{__('message.POST')}}</div>
                                <div class="text-primary cta-4">{{$blogcount}}</div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="server" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">{{__('message.PROPERTIES')}}
                </div>
                <div class="text-primary cta-4">{{$productcount}}</div>
            </div>
        </div>
    </div>
    @if ($user->hasRole('super Admin') || $user->hasRole('admin'))
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="user" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">{{__('message.USERS')}}</div>
                <div class="text-primary cta-4">{{$usercount}}</div>
            </div>
        </div>
    </div>
    @endif--}}
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="arrow-top-left" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">{{__('message.MISSING TASKS')}}</div>
                <div class="text-primary cta-4">{{$taskPcount}}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="message" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">{{__('message.COMPLETED TASKS')}}</div>
                <div class="text-primary cta-4">{{$taskcount}}</div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Stats End -->
@hasrole(['super Admin', 'admin','vendedor'])
<div class="row">
    <!-- Recent Orders Start -->
    <div class="col-xl-6 mb-5">
        <h2 class="small-title">{{__('message.Posts published')}}</h2>
        <div class="mb-n2 scroll-out">
            <div class="scroll-by-count" data-count="6">
                @foreach($posts as $post)
                <div class="card mb-2 sh-15 sh-md-6">
                    <div class="card-body pt-0 pb-0 h-100">
                        <div class="row g-0 h-100 align-content-center">
                            <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                <a href="{{ route('blog.show',$post) }}" class="body-link stretched-link">{{ substr($post->name, 0, 30) }}{{ strlen($post->name) > 30? '...' : '' }}</a>
                            </div>
                            <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                @if($post->status == 0)
                                <span class="badge bg-outline-warning me-1">Borrador</span>
                                @else($post->status == 1)
                                <span class="badge bg-outline-primary me-1">Publicado</span>
                                @endif
                            </div>

                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">{{$post->created_at->format('d/m/Y')}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Contactos recientes Start -->
    <div class="col-xl-6 mb-5">
        <h2 class="small-title">{{__('message.Recent contacts')}}</h2>
        <div class="mb-n2 scroll-out">
            <div class="scroll-by-count" data-count="6">
                @foreach($contactos as $contacto)
                <div class="card mb-2 sh-15 sh-md-6">
                    <div class="card-body pt-0 pb-0 h-100">
                        <div class="row g-0 h-100 align-content-center">
                            <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                <a href="{{ route('contactos.show',$contacto->id) }}" class="body-link stretched-link">{{$contacto->name.' '.$contacto->apellido}}</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">{{$contacto->status}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Contactos recientes End -->

    {{--<!-- Performance Start -->
         <div class="col-xl-6 mb-5">
            <div class="d-flex">
                <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
                    <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <span class="small-title"></span>
                    </a>
                    <div class="dropdown-menu font-standard">
                        <div class="nav flex-column" role="tablist">
                            <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Weekly</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Monthly</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Yearly</a>
                        </div>
                    </div>
                </div>
                <h2 class="small-title">Performance</h2>
            </div>
            <div class="card sh-45 h-xl-100-card">
                <div class="card-body h-100">
                    <div class="h-100">
                        <canvas id="horizontalTooltipChart"></canvas>
                        <div class="custom-tooltip position-absolute bg-foreground rounded-md border border-separator pe-none p-3 d-flex z-index-1 align-items-center opacity-0 basic-transform-transition">
                            <div class="icon-container border d-flex align-middle align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl me-3">
                                <span class="icon"></span>
                            </div>
                            <div>
                                <span class="text d-flex align-middle text-alternate align-items-center text-small">Bread</span>
                                <span class="value d-flex align-middle text-body align-items-center cta-4">300</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Performance End -->--}}
</div>

<div class="row gx-4 gy-5">
    <!-- Top Selling Items Start -->
    <div class="col-xl-12 mb-5">
        <h2 class="small-title">{{__('message.Recent properties')}}</h2>
        <div class="scroll-out mb-n2">
            <div class="scroll-by-count" data-count="4">
                @foreach($products as $product)
                <div class="card mb-2">
                    <div class="row g-0 sh-14 sh-md-10">
                        <div class="col-auto">
                            <a href="{{route('producto.show', [$product->id])}}">
                                <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" alt="alternate text" class="card-img card-img-horizontal sw-11" />
                            </a>
                        </div>
                        <div class="col">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-12 col-md-5 d-flex align-items-center mb-2 mb-md-0">
                                        <a href="{{route('producto.show', [$product->id])}}">{{$product->name}}</a>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="badge bg-outline-primary me-1">{{$product->status}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="text-muted">
                                            {{$setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}}
                                        </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end text-muted text-medium">{{$product->created_at->format('d/m/Y')}}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Top Selling Items End -->
</div>

<div class="row">
    <div class="col-12 col-xxl">
        <div class="row">
            <!-- Activity Start -->
            <div class="col-xxl-6 mb-5">
                <h2 class="small-title">{{__('message.pending tasks')}}</h2>
                <div class="card sh-35">
                    <div class="card-body scroll-out h-100">
                        <div class="scroll h-100">
                            @foreach ($taskps as $taskp)
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    @if($taskp->status === 'Pendiente')
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="triangle" class="text-primary align-top"></i>
                                        </div>
                                    </div>
                                    @elseif ($taskp->status === 'En proceso')
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="circle" class="text-warning align-top"></i>
                                        </div>
                                    </div>
                                    @elseif ($taskp->status === 'Completado')
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="square" class="text-success align-top"></i>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">{{$taskp->name}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-center align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">{{__('message.User')}}: {{$taskp->agente->name.' '.$taskp->agente->last_name}}</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">{{ $taskp->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Activity End -->

            <!-- Recent Reviews Start -->
            {{--<div class="col-xxl-6 mb-5">
                    <h2 class="small-title">Recent Reviews</h2>
                    <div class="card sh-35">
                        <div class="card-body mb-n2 scroll-out h-100">
                            <div class="scroll h-100">
                                <div class="row g-0 sh-10 mb-3">
                                    <div class="col-auto">
                                        <a href="/Products/Detail">
                                            <img src="/img/product/small/product-2.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <a href="/Customers/Detail" class="body-link">Kathleen Bertha</a>
                                                </div>
                                                <div class="text-small text-muted text-truncate mb-1">
                                                    Chocolate bar marzipan marzipan carrot cake gingerbread pastry ice cream. Ice cream danish sugar plum biscuit pudding powder
                                                    soufflé donut macaroon.
                                                </div>
                                                <div class="br-wrapper br-theme-cs-icon">
                                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 sh-10 mb-3">
                                    <div class="col-auto">
                                        <a href="/Products/Detail">
                                            <img src="/img/product/small/product-3.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <a href="/Customers/Detail" class="body-link">Kathleen Bertha</a>
                                                </div>
                                                <div class="text-small text-muted text-truncate mb-1">Bear claw sweet liquorice jujubes. Muffin gingerbread bear claw.</div>
                                                <div class="br-wrapper br-theme-cs-icon">
                                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 sh-10 mb-3">
                                    <div class="col-auto">
                                        <a href="/Products/Detail">
                                            <img src="/img/product/small/product-1.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <a href="/Customers/Detail" class="body-link">Olli Hawkins</a>
                                                </div>
                                                <div class="text-small text-muted text-truncate mb-1">Bear claw sweet liquorice jujubes. Muffin gingerbread bear claw.</div>
                                                <div class="br-wrapper br-theme-cs-icon">
                                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 sh-10">
                                    <div class="col-auto">
                                        <a href="/Products/Detail">
                                            <img src="/img/product/small/product-10.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <a href="/Customers/Detail" class="body-link">Zayn Hammond</a>
                                                </div>
                                                <div class="text-small text-muted text-truncate mb-1">Chupa chups candy canes.</div>
                                                <div class="br-wrapper br-theme-cs-icon">
                                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent Reviews End -->
            </div>
        </div>

        <!-- Tips Start -->
        <div class="col-12 col-xxl-auto mb-5">
            <h2 class="small-title">Tips</h2>
            <div class="card h-100-card sw-xxl-40">
                <div class="card-body row g-0">
                    <div class="col-12 d-flex flex-column justify-content-between align-items-start">
                        <div>
                            <div class="cta-3">More sales?</div>
                            <div class="mb-3 cta-3 text-primary">Add new products!</div>
                            <div class="text-muted mb-4">
                                Cheesecake chocolate carrot cake pie lollipop apple pie lemon cream lollipop.
                                <br />
                                Oat cake lemon drops gummi pie cake cotton.
                            </div>
                        </div>
                        <a href="/Products/List" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link">
                            <i data-acorn-icon="plus"></i>
                            <span>Add Products</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tips End -->--}}
        </div>
        @endhasrole

        @hasrole('Vendedor')
        <h3>Bienvenido Agente-vendedor puedes realizar tus Anuncios agregando una nueva propiedad</h3>
        @endhasrole

    </div>
    @endsection



    @else









    @endif