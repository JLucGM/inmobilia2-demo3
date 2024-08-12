<h1 class="small-title">{{ __('message.info tag') }}</h1>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-12 mb-4">
                {!! Form::label('name', __('message.Name')) !!}<label class="text-danger" for="">* </label>
                {!! Form::text('name', null, ['class'=>'form-control'. ($errors->has('name') ? ' is-invalid' : ''),'placeholder'=> __('message.Name')]) !!}

                @error('name')
                <small class="text-danger">
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group col-12 mb-4">
            {!! Form::label('slug', __('message.Slug')) !!}<label class="text-danger" for="">* </label>
            {!! Form::text('slug', null, ['class'=>'form-control'. ($errors->has('slug') ? ' is-invalid' : ''),'readonsly','placeholder'=> __('message.Slug') ]) !!}
            @error('slug')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>

        {{--<div class="form-group col-12">
            {!! Form::label('color', __('message.Color')) !!}
            {!! Form::select('color',$colors, null, ['class'=> 'form-control']) !!}

            @error('color')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>--}}
    </div>
</div>
</div>

<div class="card-footer">
    {!! Form::submit( __('message.Save'),['class'=>'btn btn-outline-primary']) !!}
</div>