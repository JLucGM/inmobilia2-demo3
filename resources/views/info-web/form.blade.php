<div class="card">
    <div class="card-body">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main-tab-pane" type="button" role="tab" aria-controls="main-tab-pane" aria-selected="true">{{ __('message.Main information') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="first-tab" data-bs-toggle="tab" data-bs-target="#first-tab-pane" type="button" role="tab" aria-controls="first-tab-pane" aria-selected="true">{{ __('message.First information of the division') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="second-tab" data-bs-toggle="tab" data-bs-target="#second-tab-pane" type="button" role="tab" aria-controls="second-tab-pane" aria-selected="false">{{ __('message.property publishing section') }}</button>
            </li>
            {{--<li class="nav-item" role="presentation">
                <button class="nav-link" id="thrid-tab" data-bs-toggle="tab" data-bs-target="#thrid-tab-pane" type="button" role="tab" aria-controls="thrid-tab-pane" aria-selected="false">{{ __('message.property publishing section') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#four-tab-pane" type="button" role="tab" aria-controls="four-tab-pane" aria-selected="false">{{ __('message.Fourth division information') }}</button>
            </li>--}}
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="main-tab-pane" role="tabpanel" aria-labelledby="main-tab" tabindex="0">
                <div class="row">

                    <h4 class="small-title my-3">{{ __('message.Service section information') }}</h4>
                    <div class="form-group col-12 mb-4">
                        {{ Form::label('select_us', __('message.Title'),['class'=>'form-label']) }}
                        {{ Form::text('title_info', $infoWeb->title_info, ['class' => 'form-control' . ($errors->has('title_info') ? ' is-invalid' : ''), 'placeholder' => __('message.Title')]) }}
                        {!! $errors->first('title_info', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('select_us', __('message.Description'),['class'=>'form-label']) }}
                        {{ Form::text('select_us', $infoWeb->select_us, ['class' => 'form-control' . ($errors->has('select_us') ? ' is-invalid' : ''), 'placeholder' => __('message.Description')]) }}
                        {!! $errors->first('select_us', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="first-tab-pane" role="tabpanel" aria-labelledby="first-tab" tabindex="0">
                <div class="row">

                    <h4 class="small-title my-3">{{ __('message.First information of the division') }}</h4>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('title_first', __('message.Title'),['class'=>'form-label']) }}
                        {{ Form::text('title_first', $infoWeb->title_first, ['class' => 'form-control' . ($errors->has('title_first') ? ' is-invalid' : ''), 'placeholder' =>  __('message.Title')]) }}
                        {!! $errors->first('title_first', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('sell_home', __('message.Description'),['class'=>'form-label']) }}
                        {{ Form::text('sell_home', $infoWeb->sell_home, ['class' => 'form-control' . ($errors->has('sell_home') ? ' is-invalid' : ''), 'placeholder' => __('message.Description')]) }}
                        {!! $errors->first('sell_home', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('icon_first', __('message.Icon'),['class'=>'form-label']) }}
                        {{ Form::text('icon_first', $infoWeb->icon_first, ['class' => 'form-control' . ($errors->has('icon_first') ? ' is-invalid' : ''), 'placeholder' => __('message.Icon')]) }}
                        {!! $errors->first('icon_first', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="row">
                    <h4 class="small-title my-3">{{ __('message.Second division information') }}</h4>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('title_second', __('message.Title'),['class'=>'form-label']) }}
                        {{ Form::text('title_second', $infoWeb->title_second, ['class' => 'form-control' . ($errors->has('title_second') ? ' is-invalid' : ''), 'placeholder' => __('message.Title')]) }}
                        {!! $errors->first('title_second', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('rent_home', __('message.Description'),['class'=>'form-label']) }}
                        {{ Form::text('rent_home', $infoWeb->rent_home, ['class' => 'form-control' . ($errors->has('rent_home') ? ' is-invalid' : ''), 'placeholder' => __('message.Description')]) }}
                        {!! $errors->first('rent_home', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('icon_second', __('message.Icon'),['class'=>'form-label']) }}
                        {{ Form::text('icon_second', $infoWeb->icon_second, ['class' => 'form-control' . ($errors->has('icon_second') ? ' is-invalid' : ''), 'placeholder' => __('message.Icon')]) }}
                        {!! $errors->first('icon_second', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="row">
                    <h4 class="small-title my-3">{{ __('message.Third division information') }}</h4>
                    <div class="form-group col-12 mb-4">
                        {{ Form::label('title_thrid', __('message.Title'),['class'=>'form-label']) }}
                        {{ Form::text('title_thrid', $infoWeb->title_thrid, ['class' => 'form-control' . ($errors->has('title_thrid') ? ' is-invalid' : ''), 'placeholder' => __('message.Title')]) }}
                        {!! $errors->first('title_thrid', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('buy_home', __('message.Description'),['class'=>'form-label']) }}
                        {{ Form::text('buy_home', $infoWeb->buy_home, ['class' => 'form-control' . ($errors->has('buy_home') ? ' is-invalid' : ''), 'placeholder' => __('message.Description')]) }}
                        {!! $errors->first('buy_home', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('icon_thrid', __('message.Icon'),['class'=>'form-label']) }}
                        {{ Form::text('icon_thrid', $infoWeb->icon_thrid, ['class' => 'form-control' . ($errors->has('icon_thrid') ? ' is-invalid' : ''), 'placeholder' => __('message.Icon')]) }}
                        {!! $errors->first('icon_thrid', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="row">
                    <h4 class="small-title my-3">{{ __('message.Fourth division information') }}</h4>
                    <div class="form-group col-12 mb-4">
                        {{ Form::label('title_fourth', __('message.Title'),['class'=>'form-label']) }}
                        {{ Form::text('title_fourth', $infoWeb->title_fourth, ['class' => 'form-control' . ($errors->has('title_fourth') ? ' is-invalid' : ''), 'placeholder' => __('message.Title')]) }}
                        {!! $errors->first('title_fourth', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('marketing_free', __('message.Description'),['class'=>'form-label']) }}
                        {{ Form::text('marketing_free', $infoWeb->marketing_free, ['class' => 'form-control' . ($errors->has('marketing_free') ? ' is-invalid' : ''), 'placeholder' => __('message.Description')]) }}
                        {!! $errors->first('marketing_free', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('icon_fourth', __('message.Icon'),['class'=>'form-label']) }}
                        {{ Form::text('icon_fourth', $infoWeb->icon_fourth, ['class' => 'form-control' . ($errors->has('icon_fourth') ? ' is-invalid' : ''), 'placeholder' => __('message.Icon')]) }}
                        {!! $errors->first('icon_fourth', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                
            </div>

            <div class="tab-pane fade" id="second-tab-pane" role="tabpanel" aria-labelledby="second-tab" tabindex="0">
            <div class="row">
                    <h4 class="small-title my-3">{{ __('message.property publishing section') }}</h4>
                    <div class="form-group col-12 mb-4">
                        {{ Form::label('title_anunciar', __('message.Title'),['class'=>'form-label']) }}
                        {{ Form::text('title_anunciar', $infoWeb->title_anunciar, ['class' => 'form-control' . ($errors->has('title_anunciar') ? ' is-invalid' : ''), 'placeholder' => __('message.Title')]) }}
                        {!! $errors->first('title_anunciar', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-12 mb-4">
                        {{ Form::label('description_anunciar', __('message.Description'),['class'=>'form-label']) }}
                        {{ Form::text('description_anunciar', $infoWeb->description_anunciar, ['class' => 'form-control' . ($errors->has('description_anunciar') ? ' is-invalid' : ''), 'placeholder' => __('message.Description')]) }}
                        {!! $errors->first('description_anunciar', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>
            </div>

            {{--<div class="tab-pane fade" id="thrid-tab-pane" role="tabpanel" aria-labelledby="thrid-tab" tabindex="0">
                tercero
            </div>

            <div class="tab-pane fade" id="four-tab-pane" role="tabpanel" aria-labelledby="four-tab" tabindex="0">
                cuatro
            </div>--}}
        </div>


        <p>{{__('message.To select your icons, go to this address and copy the class section')}} <a href="https://icons.getbootstrap.com" target="_blank">{{ __('message.Bootstrap Icons') }}</a>. {{--<a href="https://fontawesome.com/search?q=car&o=r&m=free" target="_blank">{{ __('message.Font Awesome Icons') }}</a>--}}</p>
    </div>
</div>

<div class="card-footer">
    <button class="btn btn-outline-primary" type="submit" class="form-submit">{{__('message.Save')}}</button>
</div>