@php
$html_tag_data = [];
$title = __('message.calendar');
$description= __('message.Tasks list');
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

                @can('admin.tasks.create')
                <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary btn-sm" data-placement="left">
                    {{ __('message.Create'); }}
                </a>
                @endcan
            </div>

            <div id='calendar'></div>
        </div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar:{
                left:'prev,next today',
                center:'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: @json($events),
            
        })
        calendar.render()
    })
</script>

@endsection