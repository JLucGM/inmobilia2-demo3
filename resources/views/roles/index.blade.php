@php
$html_tag_data = [];
$title = __('message.List of roles') ;
$description= __('message.List of roles')
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

    <!-- Controls Start -->
    <div class="row mb-2">
        <!-- Search Start -->
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h2 id="card_title">{{$title}}</h2>
                @can('admin.role.create')
                <a href="{{route('roles.create') }}" class="btn btn-outline-primary btn-sm" data-placement="left">{{__('message.Create')}}</a>
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
                                    <th>{{__('message.No')}}</th>
                                    <th>{{__('message.Name')}}</th>
                                    <th class="text-end">{{__('message.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $rol)
                                <tr>
                                    <td>{{ $rol->id}}</td>
                                    <td>{{ $rol->name}}</td>
                                    <td class="text-end">

                                        <form action="{{route('roles.destroy',$rol)}}" method="POST">
                                            @can('admin.role.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit role')}}" href="{{ route('roles.edit', $rol->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('delete')
                                            @can('admin.role.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete role')}}"><i class="fa fa-fw fa-trash"></i> </button>
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
            <!-- Search End -->
        </div>
        <!-- Controls End -->

        <!-- Customers List Start -->

    </div>

    @endsection