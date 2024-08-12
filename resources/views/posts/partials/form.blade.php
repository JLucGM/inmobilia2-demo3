<h1 class="small-title">{{ __('message.info post') }}</h1>

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="form-group col-12 mb-3">
                {!! Form::label('img', __('message.Image page') , ['class'=>'form-label'] ) !!}<label class="text-danger" for="">* </label>
                {!! Form::file('img', ['class'=>'form-control'. ($errors->has('name') ? ' is-invalid' : ''),'accept'=>'image/*']) !!}
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        {{ __('message.Image to be displayed in the Post max 1 mb') }}
                    </span>
                </div>
                @error('img')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-12 mb-3">
                {!! Form::label('name', __('message.Name'), ['class'=>'form-label']) !!}<label class="text-danger" for="">* </label>
                {!! Form::text('name', null, ['class'=>'form-control'. ($errors->has('name') ? ' is-invalid' : ''),'placeholder'=> __('message.Name')]) !!}
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6 mb-3">
                {!! Form::label('category_id', __('message.Category'), ['class'=>'form-label']) !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                @error('category_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6 mb-3">
                {!! Form::label('tag', __('message.Tags'), ['class'=>'form-label']) !!}
                @foreach ($tags as $tag)
                <label class="mr-2">
                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                    {{$tag->name}}
                </label>
                @endforeach

                @error('tags')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            {!! Form::hidden('user_id', auth()->user()->id, []) !!}

            <div class="form-group col-12 mb-3"><label class="text-danger" for="">* </label>
                {!! Form::label('extract', __('message.Little description'), ['class'=>'form-label']) !!}
                {!! Form::textarea('extract', null, ['class'=>'form-control', 'oninput' => 'updateCharCount(this)']) !!}
                <span id="char-count">{{__('message.Maximum 150 characters')}} (<span id="char-count-value">0</span>/150)</span>
                @error('extract')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group col-12 mb-3"><label class="text-danger" for="">* </label>
                {!! Form::label('body', __('message.Post body'), ['class'=>'form-label']) !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                @error('body')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6 mb-3">
                {!! Form::label('status', __('message.Status'), ['class'=>'form-label']) !!}
                <label class="mr-2">
                    {!! Form::radio('status', 1, true) !!}
                    {{ __('message.Draft') }}
                </label>

                <label>
                    {!! Form::radio('status', 2) !!}
                    {{ __('message.Published') }}
                </label>
                @error('status')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

        </div>
    </div>
</div>

<div class="card-footer">
    <button class="btn btn-outline-primary" id="submitButton" type="submit">{{ __('message.Save') }}</button>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#body'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertMedia'],
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    function updateCharCount(textarea) {
        const maxLength = 150;
        const charCount = textarea.value.length;
        document.getElementById('char-count-value').innerText = charCount;
        if (charCount > maxLength) {
            document.getElementById('char-count').classList.add('text-danger');
            document.getElementById('submitButton').disabled = true;
        } else {
            document.getElementById('char-count').classList.remove('text-danger');
            document.getElementById('submitButton').disabled = false;
        }
    }
</script>