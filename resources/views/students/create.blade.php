<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create student</title>
</head>
<body>
    <h2>Create Student</h2>
    <ul style="margin-bottom:40px;">
        <li><a href="{{ route('students.create') }}">Create Student</a></li>
        <li><a href="{{ route('students.index') }}">All Students</a></li>
    </ul>

    @if(session('success'))
        <div>{{ session('success') }}</div>
        
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif

    <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="">Photo</label><br>
            <input type="file" name="photo"><br><br>
        </div>


        <div>
            <label for="">Name</label><br>
            <input type="text" name="name"><br><br>
        </div>

        <div>
            <label for="">email</label><br>
            <input type="text" name="email"><br><br>
        </div>

        <button type="submit">Save</button>
    </form>

</body>
</html>