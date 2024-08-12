@php
$html_tag_data = [];
$title = __('message.List of business types');
$description= __('message.List of business types');
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

                <h2>{{$title}}</h2>

                @can('admin.typebusiness.create')
                <a href="{{ route('type_business.create') }}" class="btn btn-outline-primary btn-sm float-right" data-placement="left">
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

                                    <th>{{ __('message.Name') }}</th>

                                    <th class="text-end">{{ __('message.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($typeBusinesses as $typeBusiness)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $typeBusiness->name }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('type_business.destroy',$typeBusiness->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-outline-primary " href="{{ route('type_business.show',$typeBusiness->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            @can('admin.typebusiness.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit type business')}}" href="{{ route('type_business.edit',$typeBusiness->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.typebusiness.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete type business')}}"><i class="fa fa-fw fa-trash"></i></button>
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