<div class="form-group row{{$errors->has($params['name']) ? 'has-error' : ''}}">
    <label  for="{{$params['name']}}"
            class="col-sm-2 control-label">{{$params['label']}}
        @if($params['required'])
            <span class="{{$params['required'] ? 'required' : ''}}">
                {{$params['required'] ? '* required' : ''}}</span>
        @endif</label>
    <div class="col-sm-10">
        <textarea
            type="{{isset($params['type']) ?? 'text'}}"
            id="{{$params['name']}}"
            name="{{$params['name']}}"
            class="form-control"
            placeholder="{{$params['label']}}"
            cols="{{$params['cols']}}"
            rows="{{$params['rows']}}"
                {{$params['required'] ? 'required' : ''}}
            @if(isset($params['read-only']) ?? false)
                readonly
            @endif
        >{{$params['value']}}</textarea>
        <small class="text-danger">{{ $errors->first($params['name']) }}</small>
    </div>
</div>
