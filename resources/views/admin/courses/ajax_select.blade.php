<option>--- select a department ---</option>
@if (!empty($departments))
    @foreach ($departments as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif
