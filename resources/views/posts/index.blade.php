@php
$html_tag_data = [];
$title = __('message.List of posts');
$description= __('message.List of posts');
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

            <div class="card-header d-flex justify-content-between">
                <h2>{{$title}}</h2>

                @can('admin.posts.create')
                <a href="{{route('posts.create') }}" class="btn btn-outline-primary btn-sm float-right" data-placement="left">{{ __('message.Create') }}</a>
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
                                <th>{{__('message.No')}}</th>
                                <th style="width: 150px;">{{__('message.Name')}}</th>
                                <th>{{__('message.Category')}}</th>
                                <th>{{__('message.Author')}}</th>
                                <th>{{__('message.Status')}}</th>
                                <th class="text-end">{{__('message.Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{ substr($post->name, 0, 80) }}{{ strlen($post->name) > 80? '...' : '' }}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->user->name.' '.$post->user->last_name}}</td>
                                <td>
                                    @if($post->status == 1)
                                    <span class="badge bg-info">{{__('message.Draft')}}</span>
                                    @else($post->status == 2)
                                    <span class="badge bg-success">{{__('message.Published')}}</span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                                        @csrf
                                        @can('admin.posts.edit')
                                        <a class="btn btn-outline-success btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.edit post')}}" href="{{route('posts.edit',$post)}}"><i class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                        @method('delete')
                                        @can('admin.posts.delete')
                                        <button class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.delete post')}}" type="submit"><i class="fa fa-fw fa-trash"></i></button>
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