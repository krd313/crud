<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show students</title>
</head>
<body>
    <h2>View All Students</h2>
    <ul style="margin-bottom:40px;">
        <li><a href="{{ route('students.create') }}">Create Student</a></li>
        <li><a href="{{ route('students.index') }}">All Students</a></li>
    </ul>

    @foreach ($students as $student)
    <img src="{{ asset('uploads/'.$student->photo) }}" alt="" style="width: 70px;"><br>
    {{ $student->name }} - {{ $student->email }} <br>
    <a href="{{ route('students.show', $student->id) }}">Detail</a><br>
    <a href="{{ route('students.edit', $student->id) }}">Edit</a><br>
    <form action="{{ route('students.destroy',$student->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>

    </form> <br>

    @endforeach

</body>
</html>