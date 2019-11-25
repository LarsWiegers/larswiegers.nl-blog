<div class="form-group row{{$errors->has($params['name']) ? 'has-error' : ''}}
 {{$params['required'] ? 'required' : ''}}">
    <label  for="{{$params['name']}}"
            class="col-sm-2 control-label">{{$params[ 'label']}}
        @if($params['required'])
            <span class="{{$params['required'] ? 'required' : ''}}">
                {{$params['required']? '* required' : ''}}</span>
        @endif</label>
    <div class="col-sm-10">
        <input
            type="{{isset($params['type']) ?? 'text'}}"
            id="{{$params['name']}}"
            name="{{$params['name']}}"
            class="form-control"
            value="{{$params['value']}}"
            placeholder="{{$params['label']}}"
            {{$params['required'] ? 'required' : ''}}
        @if(isset($params['read-only']) ?? false)
            readonly
        @endif>
        <small class="text-danger">{{ $errors->first($params['name']) }}</small>
    </div>
</div>
