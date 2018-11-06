<div class="form-group row{{$errors->has(array_get($params, 'name')) ? 'has-error' : ''}}">
    <label  for="{{array_get($params, 'name')}}"
            class="col-sm-2 control-label">{{array_get($params, 'label')}}</label>
    <div class="col-sm-10">
        <input
            type="{{array_get($params, 'type', 'text')}}"
            id="{{array_get($params, 'name')}}"
            name="{{array_get($params, 'name')}}"
            class="form-control"
            value="{{array_get($params, 'value')}}"
            placeholder="{{array_get($params, 'label')}}"
            {{array_get($params, 'required', false) ? 'required' : ''}}>
        <small class="text-danger">{{ $errors->first(array_get($params, 'name')) }}</small>
    </div>
</div>