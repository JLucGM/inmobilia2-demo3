 @php
 $html_tag_data = [];
 $title = __('message.Property List');
 $description= __('message.Property List');
 @endphp
 @extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

 @section('css')
 @endsection

 @section('js_vendor')
 @endsection

 @section('js_page')
 @endsection

 @section('content')
 <div class="container-fluid">
     <div class="row">
         <div class="col-sm-12">
             <div class="d-flex justify-content-between mb-4">
                 <h1 class="card_title">{{$title}}</h1>
                 @can('admin.products.create')
                 <a href="{{route('new.product')}}" class="btn btn-outline-primary btn-sm float-right" data-placement="left">
                     {{ __('message.Create') }}
                 </a>
                 @endcan
             </div>
             <div class="card">
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <p>{{ $message }}</p>
                 </div>
                 @endif

                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-striped table-hover" id="dataTable">
                             <thead>
                                 <tr>
                                     <th>{{ __('message.No') }}</th>
                                     <th>{{ __('message.Front') }}</th>
                                     <th>{{ __('message.Name') }}</th>
                                     <th>{{ __('message.Price') }}</th>
                                     <th>{{ __('message.Status') }}</th>
                                     <th class="text-end">{{ __('message.Action') }}</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($products as $product)
                                 
                                 <tr>
                                     <td>{{++$i}}</td>
                                     <td><img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="" style=" width: 70px; height:50px"></td>
                                     <td>{{ substr($product->name, 0, 45) }}{{ strlen($product->name) > 45? '...' : '' }}</td>
                                     <td>{{ number_format($product->price, 2, ',', '.').' '.$SettingGeneral->monedaSetting->denominacion }}</td>
                                     <td><span class="badge bg-success">{{ __('message.' . strtolower($product->typeBusiness->name)) }}</span></td>
                                     <td class="text-end">
                                         <form action="{{ route('propiedad.delete', $product->id) }}" method="GET">
                                             @csrf
                                             <a class="btn btn-sm btn-outline-primary d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Contact information')}}" href="{{ route('product.show',$product->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>
                                             @can('admin.products.edit')
                                             <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Update property')}}" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                             @endcan
                                             @can('admin.products.delete')
                                             <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete property')}}"><i class="fa fa-fw fa-trash"></i> </button>
                                             @endcan
                                         </form>
                                     </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection