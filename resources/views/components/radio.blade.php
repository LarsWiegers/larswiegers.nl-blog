<div class="form-group row{{$errors->has($params[ 'name']) ? 'has-error' : ''}}
 {{$params[ 'required'] ?? ''}}">
    <label  for="{{$params['name']}}"
            class="col-sm-2 control-label">{{$params[ 'label']}}
        @if(isset($params[ 'required']))
            <span class="{{$params[ 'required'] ?? ''}}">
                {{$params[ 'required'] ? '* required' : ''}}</span>
        @endif</label>
    <div class="col-sm-10">
        @foreach($params[ 'options'] as $index => $option)
            <label>
                {{$option}} <input
                    type="radio"
                    id="{{$params[ 'name']}}"
                    name="{{$params[ 'name']}}"
                    class="form-control"
                    value="{{$index}}"
                    placeholder="{{$params[ 'label']}}"
                    {{$params[ 'required'] ?? ''}}
                    @if($index == $params[ 'value'])
                    checked
                    @endif
                >
            </label>

        @endforeach
        <small class="text-danger">{{ $errors->first($params[ 'name']) }}</small>
    </div>
</div>
