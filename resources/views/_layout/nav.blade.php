   <div class="nav-content d-flex">
       <!-- Logo Start -->
       <div class="logo position-relative">
           <a href="/">
               <!-- Logo can be added directly -->
               {{--<img src="../image/{{ $setting->logo_empresa }}" alt="logo" />--}}
               <!-- Or added via css to provide different ones for different color themes -->
               <div class=""></div>
           </a>
       </div>
       <!-- Logo End -->

       <!-- User Menu Start -->
       <div class="user-container d-flex">
           <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

               @if (auth()->check())
               <img class="profile" alt="profile" src="{{asset('img/profile/'.auth()->user()->avatar)}}" />
               <div class="name">{{auth()->user()->name.' '.auth()->user()->last_name}}</div>
               @else
               <div class="name">{{ __('message.You shouldnt be here') }}</div>
               @endif
           </a>



           @if (auth()->check())

           <div class="dropdown-menu dropdown-menu-end user-menu wide">
               <div class="row mb-1 ms-0 me-0">
                   <div class="col-6 ps-1 pe-1">
                       <ul class="list-unstyled">
                           <li>
                               <a href="/">
                                   <i data-acorn-icon="home" class="me-2" data-acorn-size="17"></i>
                                   <span class="align-middle">{{ __('message.Home') }}</span>
                               </a>
                           </li>
                           <li>
                               <a href="{{route('profile')}}">
                                   <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                                   <span class="align-middle">{{ __('message.Profile') }}</span>
                               </a>
                           </li>
                       </ul>
                   </div>
                   <div class="col-6 pe-1 ps-1">
                       <ul class="list-unstyled">
                           <li>
                               <a href="{{route('login.destroy')}}">
                                   <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                   <span class="align-middle">{{ __('message.Exit') }}</span>
                               </a>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <!-- User Menu End -->

       <!-- Icons Menu Start -->
       <ul class="list-unstyled list-inline text-center menu-icons">
           {{--<li class="list-inline-item">
               <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                   <i data-acorn-icon="search" data-acorn-size="18"></i>
               </a>
           </li>--}}
           <li class="list-inline-item">
               <a href="/" class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Home')}}">
                   <i data-acorn-icon="home" class="" data-acorn-size="17"></i>
               </a>
           </li>
           <li class="list-inline-item">
               <a href="{{route('profile')}}" class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Profile')}}">
                   <i data-acorn-icon="user" class="" data-acorn-size="17"></i>

               </a>
           </li>
           <li class="list-inline-item">
               <a href="#" id="pinButton" class="pin-button d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.lock navigation bar')}}">
                   <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                   <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
               </a>
           </li>
           <li class="list-inline-item">
               <a href="#" id="colorButton" class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.reading mode')}}">
                   <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                   <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
               </a>
           </li>

           <li class="list-inline-item">
               <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                   <div class="position-relative d-inline-flex">
                       <i data-acorn-icon="bell" data-acorn-size="18"></i>
                       <span class="mx-2 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"> {{ count(auth()->user()->unreadNotifications) }}</span>
                   </div>
               </a>
               <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">

                   <a href="{{ route('markAsRead') }}" class="float-right btn btn-link text-sm ">Marcar como leidas</a>

                   <div class="scroll">
                       <ul class="list-unstyled border-last-none">

                           @forelse(auth()->user()->unreadNotifications as $notification)

                           <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                               {{--<img src="/img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />--}}
                               <div class="align-self-center">
                                   {{ $notification->data['title']}}
                                   <div>

                                       {{ $notification->data['message'] }}.

                                       <span class="float-right text-muted text-sm"> {{ $notification->created_at->diffForHumans() }} </span>

                                   </div>

                               </div>
                           </li>
                           @empty
                           <li>
                               <div class="dropdown-item text-justify">
                                   <p class="m- text-justify">
                                       No hay notificaciones nuevas
                                   </p>
                               </div>
                           </li>
                           @endforelse

                       </ul>
                   </div>
               </div>
           </li>

           <li class="list-inline-item">
               <a href="{{route('login.destroy')}}" class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.sign off')}}">
                   <i data-acorn-icon="logout" class="" data-acorn-size="17"></i>
               </a>
           </li>
       </ul>
       <!-- Icons Menu End -->

       <!-- Menu Start -->
       <div class="menu-container flex-grow-1">
           <ul id="menu" class="menu">
               <li>
                   <a href="/Dashboard">
                       <i data-acorn-icon="dashboard-1" class="icon" data-acorn-size="18"></i>
                       <span class="label">{{ __('message.Dashboard') }}</span>
                   </a>
               </li>
               <li>
                   @canAny(['admin.user.index', 'admin.role.index'])
                   <a href="#customers" data-href="{{route('user.index')}}">
                       <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                       <span class="label">{{ __('message.User') }}</span>
                   </a>
                   @endcan
                   <ul id="customers">
                       @can('admin.user.index')
                       <li>
                           <a href="{{route('user.index')}}">
                               <span class="label">{{ __('message.User List') }}</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>

               <li>
                   @canAny(['admin.products.index','admin.amenities-checks.index'])
                   <a href="#products" data-href="{{route('product.index')}}">
                       <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                       <span class="label">{{ __('message.Properties') }}</span>
                   </a>
                   @endcan
                   <ul id="products">
                       @can('admin.products.index')
                       <li>
                           <a href="{{route('product.index')}}">
                               <span class="label">{{ __('message.Property List') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.amenities-checks.index')
                       <li>
                           <a href="{{route('amenities-checks.index')}}">
                               <span class="label">{{ __('message.Amenities') }}</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>

               <li>
                   @canAny(['admin.contactos.index','admin.negocios.index','admin.tasks.index'])
                   <a href="#crm" data-href="{{route('product.index')}}">
                       <i data-acorn-icon="archive" class="icon" data-acorn-size="18"></i>
                       <span class="label">{{ __('message.CRM') }}</span>
                   </a>
                   @endcan
                   <ul id="crm">
                       @can('admin.contactos.index')
                       <li>
                           <a href="{{route('contactos.index')}}">
                               <span class="label">{{ __('message.Contact list') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.negocios.index')
                       <li>
                           <a href="{{route('negocios.index')}}">
                               <span class="label">{{ __('message.Property Business List') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.tasks.index')
                       <li>
                           <a href="{{route('tasks.calendar')}}">
                               <span class="label">{{ __('message.calendar') }}</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('tasks.index')}}">
                               <span class="label">{{ __('message.Tasks list') }}</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>

               <li>
                   @canAny(['admin.faqs.index','admin.testimonios.index','admin.pages.index','admin.slides.index'])
                   <a href="#frontend" data-href="{{route('user.index')}}">
                       <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                       <span class="label">{{ __('message.frontend') }}</span>
                   </a>
                   @endcan
                   <ul id="frontend">

                       @can('admin.faqs.index')
                       <li>
                           <a href="{{route('faqs.index')}}">
                               {{--<i class="fa-regular fa-circle-question icon" data-acorn-size="18"></i>--}}
                               <span class="label">{{ __('message.FAQS List') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.testimonios.index')
                       <li>
                           <a href="{{route('testimonios.index')}}">
                               {{--<i class="fa-regular fa-pen-to-square"></i>--}}
                               <span class="label">{{ __('message.Testimony List') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.pages.index')
                       <li>
                           <a href="{{route('pages.index')}}">
                               {{--<i class="fa-regular fa-comment-dots icon" data-acorn-size="18"></i>--}}
                               <span class="label">{{ __('message.Page List') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.slides.index')
                       <li>
                           <a href="{{route('slides.index')}}">
                               {{--<i data-acorn-icon="board-3" class="icon" data-acorn-size="18"></i>--}}
                               <span class="label">{{ __('message.slide list') }}</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>
               <li>
                   @canAny(['admin.posts.index','admin.cat.index','admin.tags.index'])
                   <a href="#blog" data-href="{{route('user.index')}}">
                       <i data-acorn-icon="send" class="icon" data-acorn-size="18"></i>
                       <span class="label">{{ __('message.Blog') }}</span>
                   </a>
                   @endcan
                   <ul id="blog">
                       @can('admin.posts.index')
                       <li>
                           <a href="{{route('posts.index')}}">
                               <span class="label">{{ __('message.List of posts') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.categorias.index')
                       <li>
                           <a href="{{route('cat.index')}}">
                               <span class="label">{{ __('message.List of categories') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.tags.index')
                       <li>
                           <a href="{{route('tags.index')}}">
                               <span class="label">{{ __('message.list of tags') }}</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>

               {{--@can('admin.popups.index')
           <li>
               <a href="{{route('popups.index')}}">
               <i class="fa-regular fa-circle-question icon" data-acorn-size="18"></i>
               <span class="label">popup</span>
               </a>
               </li>
               @endcan--}}

               <li>
                   @canAny(['admin.setting-generals.index','admin.info-webs.index','admin.role.index','admin.typebusiness.index','admin.phystates.index','admin.customerstype.index','admin.origin.index','admin.statuscontact.index'])
                   <a href="#storefront" data-href="/Storefront/Home">
                       <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                       <span class="label">{{ __('message.Settings') }}</span>
                   </a>
                   @endcan
                   <ul id="storefront">
                       @can('admin.setting-generals.index')
                       <li>
                           <a href="{{route('setting-generals.index')}}">
                               <span class="label">{{ __('message.General') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.info-webs.index')
                       <li>
                           <a href="{{route('info-webs.index')}}">
                               <span class="label">{{ __('message.Main information') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.role.index')
                       <li>
                           <a href="{{route('roles.index')}}">
                               <span class="label">{{ __('message.List of roles') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.typebusiness.index')
                       <li>
                           <a href="{{route('type_business.index')}}">
                               <span class="label">{{ __('message.List of business types') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.phystates.index')
                       <li>
                           <a href="{{route('phy-states.index')}}">
                               <span class="label">{{ __('message.List of physical states') }}</span>
                           </a>
                       </li>
                       @endcan

                       @can('admin.customerstype.index')
                       <li>
                           <a href="{{route('customer-types.index')}}">
                               <span class="label">{{ __('message.customer types list') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.origin.index')
                       <li>
                           <a href="{{route('origins.index')}}">
                               <span class="label">{{ __('message.origin list') }}</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.statuscontact.index')
                       <li>
                           <a href="{{route('status-contacts.index')}}">
                               <span class="label">{{ __('message.status contact list') }}</span>
                           </a>
                       </li>
                       @endcan

                       <li>
                           @canAny(['admin.paises.index','admin.ciudades.index','admin.estados.index'])
                           <a href="#location">
                               {{--<i class="fa-regular fa-map icon" data-acorn-size="18"></i>--}}
                               <span class="label">{{ __('message.Location') }}</span>
                           </a>
                           @endcan
                           <ul id="location">
                               @can('admin.paises.index')
                               <li>
                                   <a href="{{route('paises.index')}}">
                                       <span class="label">{{ __('message.List of countries') }}</span>
                                   </a>
                               </li>
                               @endcan
                               <li>
                                   @can('admin.estados.index')
                                   <a href="{{route('estados.index')}}">
                                       <span class="label">{{ __('message.States List') }}</span>
                                   </a>
                                   @endcan
                               </li>
                               @can('admin.ciudades.index')
                               <li>
                                   <a href="{{route('city.index')}}">
                                       <span class="label">{{ __('message.List of cities') }}</span>
                                   </a>
                               </li>
                               @endcan
                           </ul>
                       </li>
                   </ul>
               </li>
           </ul>
       </div>
       <!-- Menu End -->
       @else
       <a href="{{ route('home') }}" class="btn">{{ __('message.Back home') }}</a>
       @endif
       <!-- Mobile Buttons Start -->
       <div class="mobile-buttons-container">
           <!-- Menu Button Start -->
           <a href="#" id="mobileMenuButton" class="menu-button">
               <i data-acorn-icon="menu"></i>
           </a>
           <!-- Menu Button End -->
       </div>
       <!-- Mobile Buttons End -->
   </div>
   <div class="nav-shadow"></div>