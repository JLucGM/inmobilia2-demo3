@extends('layouts.app')

@section('template_title')
    {{ $phyState->name ?? 'Show Phy State' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Phy State</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('phy-states.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $phyState->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
