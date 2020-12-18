<select name="filter[{{ $attribute }}]" id="{{ $attribute }}" class="{{ \Libs\DataTable\Config::$selectFilter }}">
    @foreach($data as $value)
        <option value="{{ $value[$mapKey[0]] }}">{{ $value[$mapKey[1]] }}</option>
    @endforeach
</select>
