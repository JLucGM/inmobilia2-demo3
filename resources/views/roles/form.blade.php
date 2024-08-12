<h1 class="small-title">{{ __('message.info role') }}</h1>

<div class="card">
    <div class="card-body">

        <div class="form-group col-12">
            <div class="mb-3">
                <label class="form-label">{{ __('message.Name') }}</label><label class="text-danger" for="">* </label>
                {!! Form::text('name', null, ['class'=>'form-control'. ($errors->has('name') ? ' is-invalid' : ''),'placeholder'=> __('message.Name')]) !!}
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>

        <div class="form-group col-12">
            <label class="form-label">{{ __('message.Permissions') }}</label><label class="text-danger" for="">* </label>

            @foreach($permissions as $permission)
            <div class="mb-2">
                {!! Form::checkbox('permissions[]',$permission->id,null,['class'=>'mr-1']) !!}
                <label class="form-label" for="">{{$permission->description.' | '.$permission->name}}</label>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card-footer">
    <button class="btn btn-outline-primary" type="submit">{{ __('message.Save') }}</button>
</div>