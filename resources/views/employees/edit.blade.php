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

        <select name="department_id">

            <option value="">
                Select Department
            </option>

            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach

        </select><br><br>

        <select name="designation_id">

            <option value="">
                Select Designation
            </option>

            @foreach ($designations as $designation)
                <option value="{{ $designation->id }}"
                    {{ $employee->designation_id == $designation->id ? 'selected' : '' }}>
                    {{ $designation->name }}
                </option>
            @endforeach

        </select><br><br>

        <input type="number" name="salary" value="{{ $employee->salary }}"><br><br>

        @if ($employee->image)
            <img src="{{ asset('uploads/' . $employee->image) }}" width="80"><br><br>
        @endif

        <input type="file" name="image"><br><br>

        <button type="submit">Update</button>
    </form>

</body>

</html>
