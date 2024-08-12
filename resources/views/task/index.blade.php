@php
$html_tag_data = [];
$title = __('message.Tasks list');
$description= __('message.Tasks list');
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <div class="d-flex justify-content-between">

                <h2>{{$title}}</h2>

                @can('admin.tasks.create')
                <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary btn-sm" data-placement="left">
                    {{ __('message.Create'); }}
                </a>
                @endcan
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p class="mb-0">{{ $message }}</p>
            </div>
            @endif

            <div class="row">
                <!-- PENDIENTE -->
                <div class="col-12 col-lg-3">
                    <div class="bg-light rounded border">

                        <h6 class="text-center py-2">{{ __('message.Slope') }}</h6>

                        @foreach ($tasks as $task)
                        @if ($task->status == "Pendiente")

                        @include('task.components.cardtaskcomponent')

                        @endif
                        @endforeach
                    </div>
                </div>

                <!-- EN PROCESO -->
                <div class="col-12 col-lg-3">
                    <div class="bg-light rounded border">

                        <h6 class="text-center py-2">{{ __('message.In progress') }}</h6>

                        @foreach ($tasks as $task)
                        @if ($task->status == "En proceso")

                        @include('task.components.cardtaskcomponent')

                        @endif
                        @endforeach
                    </div>
                </div>

                <!-- COMPLETADO -->
                <div class="col-12 col-lg-3">
                    <div class="bg-light rounded border">

                        <h6 class="text-center py-2">{{ __('message.Complete') }}</h6>

                        @foreach ($tasks as $task)
                        @if ($task->status == "Completado")

                        @include('task.components.cardtaskcomponent')

                        @endif
                        @endforeach

                    </div>
                </div>
                
                <!-- COMPLETADO -->
                <div class="col-12 col-lg-3">
                    <div class="bg-light rounded border">

                        <h6 class="text-center py-2">{{ __('message.refused') }}</h6>

                        @foreach ($tasks as $task)
                        @if ($task->status == "Rechazado")

                        @include('task.components.cardtaskcomponent')

                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection