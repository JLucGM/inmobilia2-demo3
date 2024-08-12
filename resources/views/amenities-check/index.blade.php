@php
$html_tag_data = [];
$title = __('message.Amenity check');
$description= 'Verificación de comodidades'
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

                <h2>{{ $title }}</h2>

                @can('admin.amenities-checks.create')
                <a href="{{ route('amenities-checks.create') }}" class="btn btn-outline-primary btn-sm">
                    {{ __('message.Create')}}
                </a>
                @endcan
            </div>
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
                                <th>{{ __('message.General amenities')}}</th>
                                <th class="text-end">{{ __('message.Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($amenitiesChecks as $amenitiesCheck)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $amenitiesCheck->name }}</td>
                                <td>{{ $amenitiesCheck->amenitiess->name }}</td>

                                <td class="text-end">
                                    <form action="{{ route('amenities-checks.destroy',$amenitiesCheck->id) }}" method="POST">
                                        {{--<a class="btn btn-sm btn-outline-primary " href="{{ route('amenities-checks.show',$amenitiesCheck->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>--}}
                                        @csrf
                                        @can('admin.amenities-checks.edit')
                                        <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Update Amenity Check')}}" href="{{ route('amenities-checks.edit',$amenitiesCheck->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                        @method('DELETE')
                                        @can('admin.amenities-checks.delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete Amenity Check')}}"><i class="fa fa-fw fa-trash"></i></button>
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