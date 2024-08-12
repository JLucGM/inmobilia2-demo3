<h1 class="small-title">{{ __('message.info slide') }}</h1>

<div class="card">
    <div class="card-body">
        <div class=" row">

            <div class="form-group col-12  mt-4" id="c_logo">
                {!! Form::label('image', __('message.Image')) !!}<label class="text-danger" for="">* </label>
                {!! Form::file('image', ['class' => 'form-control'. ($errors->has('image') ? ' is-invalid' : ''),'accept'=>'image/*,video/*','max-size'=>'10485760','id'=>'image'],) !!}
                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                <p>{{__('message.recommended size: 1280x720px')}}</p>
            </div>

            <div class="form-group col-12  mb-4">
                {{ Form::label('title', __('message.Title'),['class'=>'mb-1']) }}<label class="text-danger" for="">* </label>
                {{ Form::text('title', $slide->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => __('message.Title')]) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group row mb-4">
                <div class="col-12 col-md-6">
                    {{ Form::label('link', __('message.link'),['class'=>'mb-1']) }}
                    <select id="product-select" class="form-control" name="link">
                    <option value="">{{__('message.Select a property')}}</option>
                        @foreach($products as $product)
                        <option value="{{ route('producto.show', $product->id) }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    {{ Form::label('link', __('message.custom link'),['class'=>'mb-1']) }}
                    {{ Form::text('link', $slide->link, ['class' => 'form-control', 'id' => 'link-input', 'placeholder' => __('message.custom link')]) }}
                </div>
                {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-12  mb-4">
                {{ Form::label('texto', __('message.Description'),['class'=>'mb-1']) }}<label class="text-danger" for="">* </label>
                {{ Form::textarea('texto', $slide->texto, ['class' => 'form-control' . ($errors->has('texto') ? ' is-invalid' : ''), 'placeholder' => __('message.Description')]) }}
                {!! $errors->first('texto', '<div class="invalid-feedback">:message</div>') !!}
            </div>


            <div class="form-group col-12  mt-4">
                <div class="form-check form-switch">
                    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('active', '1', $slide->active, ['class' => 'form-check-input', 'id' => 'switch']) !!}
                    <label class="form-check-label" for="switch">{{__('message.Active')}}</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>
</div>

<script>
    document.getElementById('product-select').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('link-input').value = selectedOption.value;
    });
</script>