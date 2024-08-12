@php
$html_tag_data = [];
$title = __('message.List of countries');
$description= __('message.List of countries');
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
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <h2>{{$title}}</h2>

                    @can('admin.popups.create')
                    <a href="{{ route('popups.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                    {{ __('message.Create') }}
                    </a>
                    @endcan
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>{{ __('message.No') }}No</th>

                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Url</th>
                                    <th>Active</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>

                                    <th class="text-end">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($popups as $popup)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $popup->title }}</td>
                                    <td>{{ $popup->description }}</td>
                                    <td>{{ $popup->image }}</td>
                                    <td>{{ $popup->url }}</td>
                                    <td>{{ $popup->active }}</td>
                                    <td>{{ $popup->start_date }}</td>
                                    <td>{{ $popup->end_date }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('popups.destroy',$popup->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('popups.show',$popup->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            @can('admin.popups.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('popups.edit',$popup->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            @endcan
                                            @can('admin.popups.delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
            {!! $popups->links() !!}
        </div>
    </div>
</div>
@endsection