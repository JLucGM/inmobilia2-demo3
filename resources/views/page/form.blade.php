<h1 class="small-title">{{ __('message.info page') }}</h1>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-12 mb-3">
                {!! Form::label('portada', __('message.Front'), ['class'=>'form-label'] ) !!}<label class="text-danger" for="">* </label>
                {!! Form::file('portada', ['class'=>'form-control'. ($errors->has('name') ? ' is-invalid' : ''),'accept'=>'image/*']) !!}
                {!! $errors->first('portada', '<div class="invalid-feedback">:message</div>') !!}
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        {{__('message.Image to be displayed in the Post max 1 mb')}}
                    </span>
                </div>

            </div>

            <div class="form-group mb-4">
                {{ Form::label('name', __('message.Name'),['class' => 'form-label']) }}</label><label class="text-danger" for="">* </label>
                {{ Form::text('name', $page->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('message.Name')]) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group mb-4">
                {{ Form::label('body', __('message.Body'),['class' => 'form-label']) }}
                {{ Form::textarea('body', $page->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => __('message.Body')]) }}
                {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12  mt-4">
                <div class="form-check form-switch">
                    {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('status', '1', $page->status, ['class' => 'form-check-input', 'id' => 'switch']) !!}
                    <label class="form-check-label" for="switch">{{__('message.Active')}}</label>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-outline-primary">{{__('message.Save')}}</button>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>