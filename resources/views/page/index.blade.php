@php
$html_tag_data = [];
$title = __('message.Page List');
$description= __('message.Page List');
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
                @can('admin.pages.create')
                <a href="{{ route('pages.create') }}" class="btn btn-outline-primary btn-sm">
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
                                    <th>{{ __('message.Slug') }}</th>
                                    <th>{{ __('message.Status') }}</th>
                                    <th class="text-end">{{ __('message.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>
                                        @if($page->status == 1 )
                                        <span class="badge bg-success">{{__('message.Publish')}}</span>
                                        @endif
                                        @if($page->status == 0 )
                                        <span class="badge bg-danger">{{__('message.Draft')}}</span>

                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('pages.destroy',$page->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('pages.show',$page->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            @can('admin.pages.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit page')}}" href="{{ route('pages.edit',$page->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.pages.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete page')}}"><i class="fa fa-fw fa-trash"></i></button>
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