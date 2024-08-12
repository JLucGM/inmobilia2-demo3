<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="form-group col-12 mb-4">
                <label for="formFile" class="form-label ">{{ __('message.Image') }}</label><label class="text-danger" for="">* </label>
                <input class="form-control {{($errors->has('image') ? ' is-invalid' : '')}}" name="image" type="file" id="formFile">
                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}

            </div>

            <div class="form-group col-12 mb-4">
                {{ Form::label('name', __('message.Name'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('name', $testimonio->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' =>  __('message.Name')]) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12 mb-4">
    {{ Form::label('testitomio', __('message.Testimony'),['class'=>'form-label']) }}<label class="text-danger" for="">* </label>
    {{ Form::textarea('testimonio', $testimonio->testimonio, ['class' => 'form-control' . ($errors->has('testimonio') ? ' is-invalid' : ''), 'placeholder' => __('message.Testimony'), 'rows' => 5]) }}
    {!! $errors->first('testimonio', '<div class="invalid-feedback">:message</div>') !!}
</div>

        </div>
    </div>
</div>
<div class="card-footer">
    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{ __('message.Save') }}</button>
</div>