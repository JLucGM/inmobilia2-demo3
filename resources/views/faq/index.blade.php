@php
$html_tag_data = [];
$title = __('message.FAQS List');
$description= __('message.FAQS List');
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
                <h2>{{ $title }}</h2>
                @can('admin.faqs.create')
                <a href="{{ route('faqs.create') }}" class="btn btn-outline-primary btn-sm ">
                    {{__('message.Create')}}
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
                                    <th>{{__('message.No')}}</th>
                                    <th>{{__('message.Questions')}}</th>
                                    <th>{{__('message.Answers')}}</th>
                                    <th>{{__('message.Status')}}</th>
                                    <th class="text-end" style="width: 100px;">{{__('message.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ substr($faq->question, 0, 120) }}{{ strlen($faq->question) > 120? '...' : '' }}</td>
                                    <td>{{ substr($faq->answer, 0, 120) }}{{ strlen($faq->answer) > 120? '...' : '' }}</td>
                                    <td class="align-middle"><span class="badge bg-success">{{ __('message.' . strtolower($faq->status)) }}</span></td>

                                    <td class="text-end">
                                        <form action="{{ route('faqs.destroy',$faq->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-outline-primary " href="{{ route('faqs.show',$faq->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            @can('admin.faqs.edit')
                                            <a class="btn btn-sm btn-outline-success d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Edit FAQS')}}" href="{{ route('faqs.edit',$faq->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.faqs.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete FAQS')}}"><i class="fa fa-fw fa-trash"></i></button>
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