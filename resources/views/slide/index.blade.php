@php
$html_tag_data = [];
$title = __('message.slide list');
$description= __('message.Description');
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
            <div class="d-flex justify-content-between">
                <h1>{{ $title }}</h1>
                @can('admin.slides.create')
                <a href="{{ route('slides.create') }}" class="btn btn-outline-primary btn-sm float-right" data-placement="left">
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
                            <thead class="thead">
                                <tr>
                                    <th>{{ __('message.No') }}</th>
                                    <th>{{ __('message.Front') }}</th>
                                    <th>{{ __('message.Title') }}</th>
                                    <th>{{ __('message.Description') }}</th>
                                    <th>{{ __('message.Status') }}</th>
                                    <th class="text-end">{{ __('message.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="/image/sliders/{{$slide->image}}" class="" style=" width: 70px; height:50px"></td>
                                    <td>{{ $slide->title }}</td>
                                    <td>{{ substr($slide->texto, 0, 40) }}{{ strlen($slide->texto) > 40? '...' : '' }}</td>

                                    <td>
                                        @if($slide->active == 1)
                                        <span class="badge bg-success">Publicado</span>
                                        @else($slide->active == 0)
                                        <span class="badge bg-danger">Inactivo</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <form action="{{ route('slides.destroy',$slide->id) }}" method="POST">
                                            {{-- <a class="btn btn-sm btn-primary " href="{{ route('slides.show',$slide->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                            @can('admin.slides.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit slide')}}" href="{{ route('slides.edit',$slide->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.slides.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete slide')}}"><i class="fa fa-fw fa-trash"></i></button>
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