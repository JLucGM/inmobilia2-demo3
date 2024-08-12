<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="General-tab" data-bs-toggle="tab" data-bs-target="#General-tab-pane" type="button" role="tab" aria-controls="General-tab-pane" aria-selected="true">{{__('message.General')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social-tab-pane" type="button" role="tab" aria-controls="social-tab-pane" aria-selected="false">{{__('message.Social networks')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="blog-tab" data-bs-toggle="tab" data-bs-target="#blog-tab-pane" type="button" role="tab" aria-controls="blog-tab-pane" aria-selected="false">{{__('message.Blog')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contactus-tab" data-bs-toggle="tab" data-bs-target="#contactus-tab-pane" type="button" role="tab" aria-controls="contactus-tab-pane" aria-selected="false">{{__('message.Contact')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq-tab-pane" type="button" role="tab" aria-controls="faq-tab-pane" aria-selected="false">{{__('message.FAQ')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Anunciar-tab" data-bs-toggle="tab" data-bs-target="#Anunciar-tab-pane" type="button" role="tab" aria-controls="Anunciar-tab-pane" aria-selected="false">{{__('message.publish property')}}</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="General-tab-pane" role="tabpanel" aria-labelledby="General-tab" tabindex="0">
                <div class="row ">
                    <h1 class="my-3 small-title">{{ __('message.General information') }}</h1>

                    <div class="form-group col-12">
                        <img class="border-0 p-0" src="{{asset('image/'.$settingGeneral->logo_empresa)}}" style="width:100px;" alt="">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{__('message.Logo')}}</label>
                            <input class="form-control" name="logo_empresa" type="file" id="image">
                            @if ($settingGeneral->logo_empresa)
                            <p>Archivo actual: {{ $settingGeneral->logo_empresa }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <img class="border-0 p-0" src="{{asset('image/'.$settingGeneral->logo_empresa_footer)}}" style="width:100px;" alt="">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{__('message.logo_empresa_footer')}}</label>
                            <input class="form-control" name="logo_empresa_footer" type="file" id="image">
                            @if ($settingGeneral->logo_empresa_footer)
                            <p>Archivo actual: {{ $settingGeneral->logo_empresa_footer }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <img class="border-0 p-0" src="{{asset('image/'.$settingGeneral->logo_empresa_favicon)}}" style="width:100px;" alt="">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{__('message.logo_empresa_favicon')}}</label>
                            <input class="form-control" name="logo_empresa_favicon" type="file" id="image">
                            @if ($settingGeneral->logo_empresa_favicon)
                            <p>Archivo actual: {{ $settingGeneral->logo_empresa_favicon }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Name')}}</label>
                            <input value="{{ $settingGeneral->name }}" class="form-control" name="name" type="text">
                        </div>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Phone')}}</label>
                            <input value="{{ $settingGeneral->telefono }}" class="form-control" name="telefono" type="text">
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Email')}}</label>
                            <input value="{{ $settingGeneral->email }}" class="form-control" name="email" type="text">
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-6">
                        <label for="moneda" class="form-label">{{__('message.Money')}}</label>
                        <select class="form-control" name="moneda" id="moneda">
                            <option value="{{ $settingGeneral->moneda }}">{{ $settingGeneral->monedaSetting->tipo.' - '.$settingGeneral->monedaSetting->denominacion }}</option>
                            @foreach($monedas as $moneda)
                            <option value="{{ $moneda->id }}">{{ $moneda->tipo.' - '.$moneda->denominacion }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Address')}}</label>
                            <textarea name="direccion" class="form-control" rows="2">{{ $settingGeneral->direccion }}</textarea>
                        </div>
                    </div>


                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Description')}}</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $settingGeneral->description }}</textarea>
                        </div>
                    </div>

                </div>
                <h1 class="my-3 small-title">{{ __('message.Home sections') }}</h1>

                <div class="row">
                    <div class="col-12 col-md-3">
                        <label class="form-label">{{__('message.First section')}}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="status_section_one" value="1" id="status_section_one" {{ $settingGeneral->status_section_one ? 'checked' : '' }}>
                            <label class="form-check-label" for="status_section_one">{{__('message.Active')}}</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">{{__('message.Second section')}}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="status_section_two" value="1" id="status_section_two" {{ $settingGeneral->status_section_two ? 'checked' : '' }}>
                            <label class="form-check-label" for="status_section_two">{{__('message.Active')}}</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">{{__('message.Third section')}}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="status_section_three" value="1" id="status_section_three" {{ $settingGeneral->status_section_three ? 'checked' : '' }}>
                            <label class="form-check-label" for="status_section_three">{{__('message.Active')}}</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">{{__('message.Four section')}}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="status_section_four" value="1" id="status_section_four" {{ $settingGeneral->status_section_four ? 'checked' : '' }}>
                            <label class="form-check-label" for="status_section_four">{{__('message.Active')}}</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="social-tab-pane" role="tabpanel" aria-labelledby="social-tab" tabindex="0">
                <div class="row">
                    <h1 class="my-3 small-title">{{ __('message.Social media information') }}</h1>
                    <div class="form-group col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Facebook')}}</label>
                            <input value="{{ $settingGeneral->facebook }}" class="form-control" name="facebook" type="text">
                        </div>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Twitter')}}</label>
                            <input value="{{ $settingGeneral->twitter }}" class="form-control" name="twitter" type="text">
                        </div>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Instagram')}}</label>
                            <input value="{{ $settingGeneral->instagram }}" class="form-control" name="instagram" type="text">
                        </div>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{__('message.Linkedin')}}</label>
                            <input value="{{ $settingGeneral->linkedin }}" class="form-control" name="linkedin" type="text">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="blog-tab-pane" role="tabpanel" aria-labelledby="blog-tab" tabindex="0">
                <div class="row">
                    <h1 class="my-3 small-title">{{ __('message.Blog information') }}</h1>

                    <div class="col-12 text-center">
                        <img class="img-thumbnail rounded-circles border-0 p-0" src="{{asset('img/'.$settingGeneral->portadaBlog)}}" style="width:200px;" alt="">
                    </div>

                    <div class="form-group col-12 ">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{__('message.Front')}}</label>
                            <input class="form-control" name="portadaBlog" type="file" id="image">
                            @if ($settingGeneral->portadaBlog)
                            <p>Archivo actual: {{ $settingGeneral->portadaBlog }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label for="form-control" class="form-label">{{__('message.Blog title')}}</label>
                        <input value="{{ $settingGeneral->titleBlog }}" class="form-control" name="titleBlog" type="text">
                    </div>

                    <div class="form-group col-12 mb-3">
                        {!! Form::label('descriptionBlog', __('message.Blog description'), ['class'=>'form-label']) !!}
                        {!! Form::textarea('descriptionBlog', $settingGeneral->descriptionBlog, ['class'=>'form-control']) !!}
                        {{--<p class="mb-0">{{__('message.Maximum 150 characters')}}</p>--}}

                        @error('descriptionBlog')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="tab-pane " id="contactus-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                <div class="row">
                    <h1 class="my-3 small-title">{{ __('message.Contact information') }}</h1>

                    <div class="col-12 text-center">
                        <img class="img-thumbnail rounded-circles border-0 p-0" src="{{asset('img/'.$settingGeneral->portadaContact)}}" style="width:200px;" alt="">
                    </div>

                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{ __('message.Front') }}</label>
                            <input class="form-control" name="portadaContact" type="file" id="image">
                            @if ($settingGeneral->portadaContact)
                            <p>Archivo actual: {{ $settingGeneral->portadaContact }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{ __('message.Contact title') }}</label>
                            <input value="{{ $settingGeneral->titleContact }}" class="form-control" name="titleContact" type="text">
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3">
                        {!! Form::label('descriptionContact', __('message.Description'), ['class'=>'form-label']) !!}
                        {!! Form::textarea('descriptionContact', $settingGeneral->descriptionContact, ['class'=>'form-control']) !!}
                        {{--<p class="mb-0">{{__('message.Maximum 150 characters')}}</p>--}}

                        @error('descriptionContact')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="tab-pane " id="faq-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                <div class="row">
                    <h1 class="my-3 small-title">{{ __('message.FAQ information') }}</h1>

                    <div class="col-12 text-center">
                        <img class="img-thumbnail rounded-circles border-0 p-0" src="{{asset('img/'.$settingGeneral->portadaFaq)}}" style="width:200px;" alt="">
                    </div>

                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{ __('message.Front') }}</label>
                            <input class="form-control" name="portadaFaq" type="file" id="image">
                            @if ($settingGeneral->portadaFaq)
                            <p>Archivo actual: {{ $settingGeneral->portadaFaq }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{ __('message.FAQ title') }}</label>
                            <input value="{{ $settingGeneral->titleFaq }}" class="form-control" name="titleFaq" type="text">
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3">
                        {!! Form::label('descriptionFaq', __('message.Description'), ['class'=>'form-label']) !!}
                        {!! Form::textarea('descriptionFaq', $settingGeneral->descriptionFaq, ['class'=>'form-control']) !!}
                        {{--<p class="mb-0">{{__('message.Maximum 150 characters')}}</p>--}}

                        @error('descriptionFaq')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="tab-pane " id="Anunciar-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                <div class="row">
                    <h1 class="my-3 small-title">{{ __('message.info publication') }}</h1>

                    <div class="col-12 text-center">
                        <img class="img-thumbnail rounded-circles border-0 p-0" src="{{asset('img/'.$settingGeneral->portadaAnunciar)}}" style="width:200px;" alt="">
                    </div>

                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{ __('message.Front') }}</label>
                            <input class="form-control" name="portadaAnunciar" type="file" id="image">
                            @if ($settingGeneral->portadaAnunciar)
                            <p>Archivo actual: {{ $settingGeneral->portadaAnunciar }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <div class="mb-3">
                            <label for="form-control" class="form-label">{{ __('message.Contact title') }}</label>
                            <input value="{{ $settingGeneral->titleAnunciar }}" class="form-control" name="titleAnunciar" type="text">
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3">
                        {!! Form::label('descriptionAnunciar', __('message.Description'), ['class'=>'form-label']) !!}
                        {!! Form::textarea('descriptionAnunciar', $settingGeneral->descriptionAnunciar, ['class'=>'form-control']) !!}
                        {{--<p class="mb-0">{{__('message.Maximum 150 characters')}}</p>--}}

                        @error('descriptionAnunciar')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>



<div class="card-footer">
    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>
</div>


<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
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
    
        ClassicEditor
        .create(document.querySelector('#descriptionBlog'), {
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

    ClassicEditor
        .create(document.querySelector('#descriptionFaq'), {
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
    ClassicEditor
        .create(document.querySelector('#descriptionContact'), {
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
   
    ClassicEditor
        .create(document.querySelector('#descriptionAnunciar'), {
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