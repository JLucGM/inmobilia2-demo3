@php
$html_tag_data = [];
$title = __('message.status contact list');
$description= __('message.status contact list');
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
                <a href="{{ route('status-contacts.create') }}" class="btn btn-outline-primary btn-sm" data-placement="left">
                    {{ __('message.Create')}}
                </a>
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
                                    <th>{{ __('message.No')}}</th>

                                    <th>{{ __('message.Name')}}</th>

                                    <th class="text-end">{{ __('message.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusContacts as $statusContact)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $statusContact->name }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('status-contacts.destroy',$statusContact->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('status-contacts.show',$statusContact->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.edit status contact')}}" href="{{ route('status-contacts.edit',$statusContact->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.delete status contact')}}"><i class="fa fa-fw fa-trash"></i></button>
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