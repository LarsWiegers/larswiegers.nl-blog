<div class="form-group row{{$errors->has($params['name']) ? 'has-error' : ''}}">
    <label  for="{{$params['name']}}"
            class="col-sm-2 control-label">{{$params['label']}}
        @if($params['required'])
            <span class="{{$params['required'] ? 'required' : ''}}">
                {{$params['required'] ? '* required' : ''}}</span>
        @endif</label>
    <div class="col-sm-10">
        <select
            type="{{$params['type']}}"
            id="{{$params['name']}}"
            name="{{$params['name']}}"
            class="form-control"
            placeholder="{{$params['label']}}"
            cols="{{$params['cols']}}"
            rows="{{$params['rows']}}"
                {{$params['required'] ? 'required' : ''}}>
            @foreach($params['options'] as $option)
                @if($params['selected'] == $option)
                <option value="{{$option->id}}" selected>
                    @else
                    <option value="{{$option->getFileName()}}">
                @endif
                    {{$option->getFileName()}}
                </option>
            @endforeach
            </select>
        <small class="text-danger">{{ $errors->first($params['name']) }}</small>
    </div>
</div>
