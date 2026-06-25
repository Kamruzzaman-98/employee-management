<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>

<form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $employee->name }}"><br><br>

    <input type="email" name="email" value="{{ $employee->email }}"><br><br>

    <input type="text" name="phone" value="{{ $employee->phone }}"><br><br>

    <input type="text" name="designation" value="{{ $employee->designation }}"><br><br>

    <input type="number" name="salary" value="{{ $employee->salary }}"><br><br>

    <!-- Current Image -->
    @if($employee->image)
        <img src="{{ asset('uploads/'.$employee->image) }}" width="80"><br><br>
    @endif

    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
