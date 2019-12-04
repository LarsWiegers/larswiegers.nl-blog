<div class="form-group row{{$errors->has($params['name']) ? 'has-error' : ''}}">
    <label  for="{{$params['name']}}"
            class="col-sm-2 control-label">{{$params['label']}}
        @if(isset($params['required']))
            <span class="{{$params['required'] ? 'required' : ''}}">
                {{$params['required'] ? '* required' : ''}}</span>
        @endif</label>
    <div class="col-sm-10">
        <select
            type="{{$params['type'] ?? 'text'}}"
            id="{{$params['name']}}"
            name="{{$params['name']}}"
            class="form-control"
            placeholder="{{$params['label']}}"
            cols="{{$params['cols'] ?? '2'}}"
            rows="{{$params['rows'] ?? '2'}}"
                {{$params['required'] ?? ''}}>

            @foreach($params['options'] as $option)
                @if($params['selected'] == $option)
                <option value="{{$option->id}}" selected>
                    @else
                    <option value="{{$option->id}}">
                @endif
                    {{$option->title}}
                </option>
            @endforeach
            </select>
        <small class="text-danger">{{ $errors->first($params['name']) }}</small>
    </div>
</div>
