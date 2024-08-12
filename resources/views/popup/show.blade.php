@extends('layouts.app')

@section('template_title')
    {{ $popup->name ?? 'Show Popup' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Popup</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('popups.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $popup->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $popup->description }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $popup->image }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $popup->url }}
                        </div>
                        <div class="form-group">
                            <strong>Active:</strong>
                            {{ $popup->active }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $popup->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $popup->end_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
