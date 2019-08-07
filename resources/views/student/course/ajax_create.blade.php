<select name="course_id[]" id="my-select" class="form-control">
    <option value="select a course" disabled selected>select a course</option>
    @if (!empty($courses))
        @foreach ($courses as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    @endif
</select>
