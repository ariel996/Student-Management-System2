<option>--- select a course ---</option>
@if (!empty($courses))
    @foreach ($courses as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif
