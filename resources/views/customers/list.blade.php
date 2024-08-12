@php
$html_tag_data = [];
$title = __('message.User List');
$description= __('message.User List');
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

                <h1>{{$title}}</h1>

                @can('admin.user.create')
                <a href="{{route('new.user') }}" class="btn btn-outline-primary btn-sm" data-placement="left">
                    {{__('message.Create') }}
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
                                    <th>{{__('message.No') }}</th>
                                    <th>{{__('message.Name') }}</th>
                                    <th>{{__('message.Role') }}Rol</th>
                                    <th>{{__('message.Email') }}</th>
                                    <th>{{__('message.Phone') }}</th>
                                    <th>{{__('message.Status') }}</th>
                                    <th class="text-end">{{__('message.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name.' '.$user->last_name }}</td>
                                    <td>{{implode(", ", $user->getRoleNames()->toArray())}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->whatsapp }}</td>

                                    @if ($user->status == 0)
                                    <td><span class="badge bg-danger px-3">{{__('message.Inactive') }}</span></td>
                                    @else
                                    <td><span class="badge bg-success px-3">{{__('message.Active') }}</span></td>
                                    @endif

                                    <td class="text-end">
                                        <form action="{{ route('user.delete',$user->id) }}" method="GET">
                                            @csrf
                                            @can('admin.user.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit user')}}" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            
                                            @can('admin.user.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.delete user')}}"><i class="fa fa-fw fa-trash"></i> </button>
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