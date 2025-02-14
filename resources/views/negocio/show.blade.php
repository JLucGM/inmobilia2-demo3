@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Standard Profile';
    $heading = 'Blaine Cottrell';
    $description = 'Standard Profile Page';
    $breadcrumbs = ["/"=>"Home", "/Pages"=>"Pages", "/Pages/Profile"=>"Profile"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/Chart.bundle.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/charts.extend.js"></script>
    <script src="/js/pages/profile.standard.js"></script>
@endsection

@section('content')
    <div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Detalles del negocio</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">N°.{{$negocio->id}}-{{$negocio->name  }}</h1>
                </div>
            </div>
            <!-- Title End -->
            
            <!-- Top Buttons Start -->
            <div class="col-12 col-md-5 d-flex align-items-end justify-content-end">
                <!-- Status Button Start -->
                {{-- <div class="dropdown-as-select w-100 w-md-auto">
                    <button
                    class="btn btn btn-outline-primary w-100 w-md-auto dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ></button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Status: Pending</a>
                        <a class="dropdown-item" href="#">Status: Shipped</a>
                        <a class="dropdown-item active" href="#">Status: Delivered</a>
                    </div>
                </div> --}}
                <!-- Status Button End -->
                
                <!-- Dropdown Button Start -->
                {{-- <div class="ms-1">
                    <button
                    type="button"
                    class="btn btn-outline-primary btn-icon btn-icon-only"
                    data-bs-offset="0,3"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    data-submenu
                    >
                    <i data-acorn-icon="more-horizontal"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <button class="dropdown-item" type="button">Edit</button>
                    <button class="dropdown-item" type="button">View Invoice</button>
                    <button class="dropdown-item" type="button">Track Package</button>
                </div>
            </div> --}}
            <!-- Dropdown Button End -->
        </div>
        <!-- Top Buttons End -->
    </div>
</div>
<div class="row d-flex">
    <div class="col-12 col-xl-4 col-xxl-3">
            <h2 class="small-title">Datos del contacto</h2>
            <div class="card mb-5">
                <div class="card-body mb-n5">
                    <div class="mb-5">
                        <p class="text-small text-muted mb-2">Contacto</p>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate align-middle">{{ $negocio->contacto->name ." ".$negocio->contacto->apellido  }}</div>
                        </div>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate">{{ $negocio->contacto->email }}</div>
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <p class="text-small text-muted mb-2">Direccion</p>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="pin" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate align-middle">{{ $negocio->contacto->pais ."-".$negocio->contacto->direccion }}</div>
                        </div>
                     
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate">{{ $negocio->contacto->telefonoContacto1 }}</div>
                        </div>
                         <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate">{{ $negocio->contacto->telefonoContacto2 }}</div>
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <p class="text-small text-muted mb-2">Intereses</p>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="luggage" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate align-middle">{{ $negocio->product->name }}</div>
                        </div>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="navigate-diagonal" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate">{{'Baños: '. $negocio->cantidadBaños }}</div>
                        </div>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="navigate-diagonal" class="text-primary" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col text-alternate">{{'Dormitorios: '. $negocio->cantidadDormitorios }}</div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div>
                            <p class="text-small text-muted mb-2">PAGO</p>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="credit-card" class="text-primary" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col text-alternate">{{'Presupuesto: COP$.'. $negocio->presupuestoTotal }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<!-- Title and Top Buttons End -->
            <!-- Left Side End -->

            <!-- Right Side Start -->
            <div class="col-12 col-xl-8 col-xxl-9 mb-5 tab-content">
                <!-- Overview Tab Start -->
                <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
                    <!-- Stats Start -->
                    <h2 class="small-title">Stats</h2>
                    <div class="mb-5">
                        <div class="row g-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Projects</span>
                                            <i data-acorn-icon="office" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">ACTIVE</div>
                                        <div class="cta-1 text-primary">14</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Tasks</span>
                                            <i data-acorn-icon="check-square" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">PENDING</div>
                                        <div class="cta-1 text-primary">153</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Notes</span>
                                            <i data-acorn-icon="file-empty" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">RECENT</div>
                                        <div class="cta-1 text-primary">24</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Views</span>
                                            <i data-acorn-icon="screen" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">THIS MONTH</div>
                                        <div class="cta-1 text-primary">524</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Stats End -->

                    <!-- Activity Start -->
                    <h2 class="small-title">Activity</h2>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="sh-35">
                                <canvas id="bubbleChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Activity End -->

                    <!-- Timeline Start -->
                    <h2 class="small-title">Timeline</h2>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row g-0">
                                <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                                    <div class="w-100 d-flex sh-1"></div>
                                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                                        <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                                    </div>
                                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="h-100">
                                        <div class="d-flex flex-column justify-content-start">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="heading stretched-link">Developing Components</a>
                                                <div class="text-alternate">21.12.2020</div>
                                                <div class="text-muted mt-1">
                                                    Jujubes tootsie roll liquorice cake jelly beans pudding gummi bears chocolate cake donut. Jelly-o sugar plum fruitcake bonbon
                                                    bear claw cake cookie chocolate bar. Tiramisu soufflé apple pie.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                                        <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                                    </div>
                                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="h-100">
                                        <div class="d-flex flex-column justify-content-start">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="heading stretched-link pt-0">HTML Structure</a>
                                                <div class="text-alternate">14.12.2020</div>
                                                <div class="text-muted mt-1">
                                                    Pudding gummi bears chocolate chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                                        <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                                    </div>
                                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="h-100">
                                        <div class="d-flex flex-column justify-content-start">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="heading stretched-link">Sass Structure</a>
                                                <div class="text-alternate">03.11.2020</div>
                                                <div class="text-muted mt-1">
                                                    Jelly-o wafer sesame snaps candy canes. Danish dragée toffee bonbon. Jelly-o marshmallow cake oat cake caramels jujubes.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                                        <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                                    </div>
                                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="h-100">
                                        <div class="d-flex flex-column justify-content-start">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="heading stretched-link pt-0">Final Design</a>
                                                <div class="text-alternate">15.10.2020</div>
                                                <div class="text-muted mt-1">Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                                        <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                                    </div>
                                    <div class="w-100 d-flex h-100 justify-content-center position-relative"></div>
                                </div>
                                <div class="col">
                                    <div class="h-100">
                                        <div class="d-flex flex-column justify-content-start">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="heading stretched-link pt-0">Wireframe Design</a>
                                                <div class="text-alternate">08.06.2020</div>
                                                <div class="text-muted mt-1">Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline End -->

                    <!-- Logs Start -->
                    <h2 class="small-title">Logs</h2>
                    <div class="card">
                        <div class="card-body mb-n2">
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="circle" class="text-primary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">New user registiration</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">18 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="circle" class="text-primary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">3 new product added</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">18 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="square" class="text-secondary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">
                                                Product out of stock:
                                                <a href="#" class="alternate-link underline-link">Breadstick</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">16 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="square" class="text-secondary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">Category page returned an error</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="circle" class="text-primary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">14 products added</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">
                                                New sale:
                                                <a href="#" class="alternate-link underline-link">Steirer Brot</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">
                                                New sale:
                                                <a href="#" class="alternate-link underline-link">Soda Bread</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="triangle" class="text-warning align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">Recived a support ticket</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">14 Dec</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-auto">
                                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                        <div class="sh-3">
                                            <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                        <div class="d-flex flex-column">
                                            <div class="text-alternate mt-n1 lh-1-25">
                                                New sale:
                                                <a href="#" class="alternate-link underline-link">Cholermüs</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                        <div class="text-muted ms-2 mt-n1 lh-1-25">13 Dec</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Logs End -->
                </div>
                <!-- Overview Tab End -->

                <!-- Projects Tab Start -->
                <div class="tab-pane fade" id="projectsTab" role="tabpanel">
                    <h2 class="small-title">Projects</h2>

                    <!-- Search Start -->
                    <div class="row mb-3 g-2">
                        <div class="col mb-1">
                            <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                <input class="form-control" placeholder="Search" />
                                <span class="search-magnifier-icon">
                <i data-acorn-icon="search"></i>
              </span>
                                <span class="search-delete-icon d-none">
                <i data-acorn-icon="close"></i>
              </span>
                            </div>
                        </div>
                        <div class="col-auto text-end mb-1">
                            <div class="dropdown-as-select d-inline-block" data-childselector="span">
                                <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="btn btn-foreground-alternate dropdown-toggle sw-13">All</span>
                                </button>
                                <div class="dropdown-menu shadow dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">All</a>
                                    <a class="dropdown-item" href="#">Active</a>
                                    <a class="dropdown-item" href="#">Inactive</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Search End -->

                    <!-- Projects Content Start -->
                    <div class="row row-cols-1 row-cols-sm-2 g-2">
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Basic Introduction to Bread Making</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 4</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-up" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Active</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="check-square" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">4 Facts About Old Baking Techniques</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 3</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-up" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Active</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="clock" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Apple Cake Recipe for Starters</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 8</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="lock-on" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Locked</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="sync-horizontal" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Continuing</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">A Complete Guide to Mix Dough for the Molds</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 12</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-up" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Active</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="check-square" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">14 Facts About Sugar Products</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 2</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-down" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Inactive</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="archive" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Archived</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Easy and Efficient Tricks for Baking Crispy Breads</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 2</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-up" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Active</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="clock" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Apple Cake Recipe for Starters</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 6</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-down" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Inactive</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="archive" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Archived</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Simple Guide to Mix Dough</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 22</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="lock-on" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Locked</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="check-square" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">10 Secrets Every Southern Baker Knows</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 3</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-up" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Active</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="sync-horizontal" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Continuing</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Recipes for Sweet and Healty Treats</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 1</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-down" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Inactive</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="clock" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Better Ways to Mix Dough for the Molds</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 20</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-up" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Active</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="clock" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="heading mb-3">
                                        <a href="#" class="stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">Introduction to Baking Cakes</span>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="category" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Contributors: 13</span>
                                        </div>
                                        <div class="mb-2">
                                            <i data-acorn-icon="trend-up" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Active</span>
                                        </div>
                                        <div>
                                            <i data-acorn-icon="check-square" class="text-muted me-2" data-acorn-size="17"></i>
                                            <span class="align-middle text-alternate">Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Projects Content End -->
                </div>
                <!-- Projects Tab End -->

                <!-- Permissions Tab Start -->
                <div class="tab-pane fade" id="permissionsTab" role="tabpanel">
                    <h2 class="small-title">Permissions</h2>
                    <div class="row row-cols-1 g-2">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                                        <input type="checkbox" class="form-check-input" checked />
                                        <span class="form-check-label">
                    <span class="content opacity-50">
                      <span class="heading mb-1 lh-1-25">Create</span>
                      <span class="d-block text-small text-muted">
                        Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish
                        dragée.
                      </span>
                    </span>
                  </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                                        <input type="checkbox" class="form-check-input" checked />
                                        <span class="form-check-label">
                    <span class="content opacity-50">
                      <span class="heading mb-1 lh-1-25">Publish</span>
                      <span class="d-block text-small text-muted">Jelly beans wafer candy caramels fruitcake macaroon sweet roll.</span>
                    </span>
                  </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                                        <input type="checkbox" class="form-check-input" checked />
                                        <span class="form-check-label">
                    <span class="content opacity-50">
                      <span class="heading mb-1 lh-1-25">Edit</span>
                      <span class="d-block text-small text-muted">Jelly cake jelly sesame snaps jelly beans jelly beans.</span>
                    </span>
                  </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                                        <input type="checkbox" class="form-check-input" />
                                        <span class="form-check-label">
                    <span class="content opacity-50">
                      <span class="heading mb-1 lh-1-25">Delete</span>
                      <span class="d-block text-small text-muted">Danish oat cake pudding.</span>
                    </span>
                  </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                                        <input type="checkbox" class="form-check-input" checked />
                                        <span class="form-check-label">
                    <span class="content opacity-50">
                      <span class="heading mb-1 lh-1-25">Add User</span>
                      <span class="d-block text-small text-muted">Soufflé chocolate cake chupa chups danish brownie pudding fruitcake.</span>
                    </span>
                  </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                                        <input type="checkbox" class="form-check-input" />
                                        <span class="form-check-label">
                    <span class="content opacity-50">
                      <span class="heading mb-1 lh-1-25">Edit User</span>
                      <span class="d-block text-small text-muted">Biscuit powder brownie powder sesame snaps jelly-o dragée cake.</span>
                    </span>
                  </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                                        <input type="checkbox" class="form-check-input" />
                                        <span class="form-check-label">
                    <span class="content opacity-50">
                      <span class="heading mb-1 lh-1-25">Delete User</span>
                      <span class="d-block text-small text-muted">
                        Liquorice jelly powder fruitcake oat cake. Gummies tiramisu cake jelly-o bonbon. Marshmallow liquorice croissant.
                      </span>
                    </span>
                  </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Permissions Tab End -->

                <!-- Friends Tab Start -->
                <div class="tab-pane fade" id="friendsTab" role="tabpanel">
                    <h2 class="small-title">Friends</h2>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-2 mb-5">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-1.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Blaine Cottrell</div>
                                                    <div class="text-small text-muted">Project Manager</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-4.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Cherish Kerr</div>
                                                    <div class="text-small text-muted">Development Lead</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-8.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Kirby Peters</div>
                                                    <div class="text-small text-muted">Accounting</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-5.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Olli Hawkins</div>
                                                    <div class="text-small text-muted">Client Relations Lead</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-2.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Zayn Hartley</div>
                                                    <div class="text-small text-muted">Customer Engagement</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-3.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Esperanza Lodge</div>
                                                    <div class="text-small text-muted">UX Designer</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-4.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Kerr Jackson</div>
                                                    <div class="text-small text-muted">Frontend Developer</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-6.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Kathryn Mengel</div>
                                                    <div class="text-small text-muted">Team Leader</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-6.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Joisse Kaycee</div>
                                                    <div class="text-small text-muted">Copywriter</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0 sh-6">
                                        <div class="col-auto">
                                            <img src="/img/profile/profile-7.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <div>Zayn Hartley</div>
                                                    <div class="text-small text-muted">Visual Effect Designer</div>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Friends Tab End -->

                <!-- About Tab Start -->
                <div class="tab-pane fade" id="aboutTab" role="tabpanel">
                    <h2 class="small-title">About</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">ME</p>
                                <p>
                                    Jujubes brownie marshmallow apple pie donut ice cream jelly-o jelly-o gummi bears. Tootsie roll chocolate bar dragée bonbon cheesecake
                                    icing. Danish wafer donut cookie caramels gummies topping.
                                </p>
                            </div>
                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">INTERESTS</p>
                                <p>
                                    Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish dragée.
                                    Apple pie cotton candy tiramisu biscuit cake muffin tootsie roll bear claw cake. Cupcake cake fruitcake.
                                </p>
                            </div>
                            <div>
                                <p class="text-small text-muted mb-2">CONTACT</p>
                                <a href="#" class="d-block body-link mb-1">
                                    <i data-acorn-icon="screen" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">blainecottrell.com</span>
                                </a>
                                <a href="#" class="d-block body-link">
                                    <i data-acorn-icon="email" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">contact@blainecottrell.com</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Tab End -->
            </div>
            <!-- Right Side End -->
        </div>
    </div>
@endsection
