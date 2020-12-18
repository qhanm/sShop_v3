<div class="form-group">
    @if(!empty($label))
        {!! $label !!}
    @endif
    {!! $input !!}
    @if($errors->has($name))
    <ul class="parsley-errors-list filled" id="parsley-id-25" aria-hidden="false">
        <li class="parsley-required">
            {{ $errors->first($name) }}
        </li>
    </ul>
    @endif
</div>
