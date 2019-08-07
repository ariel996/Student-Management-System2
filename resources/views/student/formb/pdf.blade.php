<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <div style="text-align: center;">
            <h2>THE UNIVERSITY OF BAMENDA</h2>
            <h3>HIGHER TECHNICAL TEACHER TRAINING COLLEGE</h3>
        </div><br/><br/>
    <h3><u>FORM B</u></h3>
    <table class="table table-striped" border="1" cellspacing="1" cellpading="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>COURSE CODE</th>
                <th>COURSE NAME</th>
                <th>CREDIT VALUE</th>
                <th>SIGNATURE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student_course as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->course->course_code }}</td>
                    <td>{{ $item->course->course_name }}</td>
                    <td>{{ $item->course->course_credit }}</td>
                    <td></td>
                </tr>
            @endforeach
    </table>
</body>
</html>
