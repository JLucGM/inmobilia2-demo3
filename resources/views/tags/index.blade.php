@php
$html_tag_data = [];
$title = __('message.Tag list');
$description= __('message.Tag list');
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
            <div class=" d-flex justify-content-between">
                <h2>{{$title}}</h2>
                @can('admin.tags.create')
                <a class="btn btn-outline-success" href="{{ route('tags.create') }}">
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
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>{{ __('message.No') }}</th>
                                <th>{{ __('message.Name') }}</th>
                                <th class="text-end">{{ __('message.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$tag->name}}</td>

                                <td class="text-end">
                                    <form action="{{route('tags.destroy',$tag)}}" method="POST">
                                        @can('admin.tags.edit')
                                        <a class="btn btn-outline-success btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit tag')}}" href="{{route('tags.edit',$tag)}}"><i class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                        @csrf
                                        @method('delete')
                                        @can('admin.tags.delete')
                                        <button class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete tag')}}" type="submit"><i class="fa fa-fw fa-trash"></i></button>
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

@endsection