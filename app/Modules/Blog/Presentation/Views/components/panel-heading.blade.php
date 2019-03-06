<div class="panel-heading">
    @php
        $modelArray = explode("\\", $model);
        $modelName = sizeof($modelArray) -1;
        $modelName = $modelArray[$modelName];
    @endphp
    <h1>{{ucfirst($type)}} a {{ucfirst( $modelName )}}</h1>
</div>
