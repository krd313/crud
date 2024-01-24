<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show student</title>
</head>
<body>
    <h2>show Student</h2>
    <ul style="margin-bottom:40px;">
        <li><a href="{{ route('students.create') }}">Create Student</a></li>
        <li><a href="{{ route('students.index') }}">All Students</a></li>
    </ul>

        <div>
            <label for="">Photo</label><br>
            <img src="{{ asset('uploads/'.$student->photo) }}" style="width: 70px;"><br><br>
        </div>


        <div>
            <label for="">Name</label><br>
            {{ $student->name }}<br><br>
        </div>

        <div>
            <label for="">email</label><br>
            {{ $student->email }}<br><br>
        </div>

</body>
</html>