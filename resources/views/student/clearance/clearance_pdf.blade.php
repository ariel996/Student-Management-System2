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

    <h2><u>CLEARANCE FORM</u></h2>
<div>
    {{$student->student_name}} {{ $student->student_surname }} , {{ $student->student_dob }} at
    {{ $student->student_pob }} from the department of {{ $student->department->department_name }}
    with {{ $student->student_matricule }} as Matricule,
</div>

    <table class="table table-striped" border="1" cellspacing="1" cellpading="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>LIBRARY</th>
                <th>DEPARTMENT</th>
                <th>EXAM RECORD</th>
                <th>SIGNATURE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->id }}</td>
                <td>OK</td>
                <td>OK</td>
                <td>OK</td>
                <td>OK</td>
            </tr>
        </tbody>

    </table>
</body>
</html>
