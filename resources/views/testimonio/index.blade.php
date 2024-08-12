@php
$html_tag_data = [];
$title = __('message.Testimony List');
$description= __('message.Testimony List');
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
                <h1>{{$title}}</h1>

                @can('admin.testimonios.create')
                <a href="{{ route('testimonios.create') }}" class="btn btn-outline-primary btn-sm" data-placement="left">
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
                                    <th>{{ __('message.Image of the person') }}</th>
                                    <th>{{ __('message.Name') }}</th>
                                    <th>{{ __('message.Testimony') }}</th>
                                    <th class="text-end">{{ __('message.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonios as $testimonio)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="/image/testimonio/{{$testimonio->image}}" style=" width: 70px; height:50px"></td>
                                    <td>{{ $testimonio->name }}</td>
                                    <td>{{ substr($testimonio->testimonio, 0, 40) }}{{ strlen($testimonio->testimonio) > 40? '...' : '' }}</td>
                                    {{-- substr($slide->texto, 0, 40) }}{{ strlen($slide->texto) > 40? '...' : '' --}}
                                    <td class="text-end">
                                        <form action="{{ route('testimonios.destroy',$testimonio->id) }}" method="POST">
                                            @can('admin.testimonios.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit Testimonial')}}" href="{{ route('testimonios.edit',$testimonio->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.testimonios.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete Testimonial')}}"><i class="fa fa-fw fa-trash"></i></button>
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