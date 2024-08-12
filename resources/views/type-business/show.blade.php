@extends('layouts.app')

@section('template_title')
    {{ $typeBusiness->name ?? 'Show Type Business' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Type Business</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type_business.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $typeBusiness->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
