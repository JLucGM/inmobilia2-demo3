@extends('layouts.app')

@section('template_title')
    {{ $origin->name ?? 'Show Origin' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Origin</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('origins.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $origin->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
