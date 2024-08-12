<h1 class="small-title">{{ __('message.info faq') }}</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-4">
                    {{ Form::label('question', __('message.Question'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                    {{ Form::text('question', $faq->question, ['class' => 'form-control' . ($errors->has('question') ? ' is-invalid' : ''), 'placeholder' => __('message.Question')]) }}
                    {!! $errors->first('question', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-12">
                <div class="form-group mb-4">
                    {{ Form::label('answer', __('message.Answer'), ['class' => 'form-label']) }}<label class="text-danger" for="">* </label>
                    {{ Form::textarea('answer', $faq->answer, ['class' => 'form-control' . ($errors->has('answer') ? ' is-invalid' : ''), 'placeholder' => __('message.Answer')]) }}
                    {!! $errors->first('answer', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-12">
                <div class="form-group mb-4">
                    {{ Form::label('Status', __('message.Status'), ['class' => 'form-label']) }}
                    <select class="form-control" name="status">
                        @if (isset($faq->status))
                        <option value="{{$faq->status}}">{{__('message.' . strtolower($faq->status))}}</option>
                        <option value="Borrador">{{__('message.Draft')}}</option>
                        <option value="Pendiente">{{__('message.Slope')}}</option>
                        <option value="Publicar">{{__('message.Publish')}}</option>
                        @else
                        <option value="Borrador">{{__('message.Draft')}}</option>
                        <option value="Pendiente">{{__('message.Slope')}}</option>
                        <option value="Publicar">{{__('message.Publish')}}</option>
                        @endif

                    </select>
                    {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-outline-primary">{{ __('message.Save') }}</button>
</div>