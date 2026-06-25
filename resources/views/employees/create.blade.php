<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Name"><br>

    <input type="email" name="email" placeholder="Email"><br>

    <input type="text" name="phone" placeholder="Phone"><br>

    <select name="department_id">

        <option value="">
            Select Department
        </option>

        @foreach ($departments as $department)
            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>
        @endforeach

    </select> <br>

    <select name="designation_id">

        <option value="">
            Select Designation
        </option>

        @foreach ($designations as $designation)
            <option value="{{ $designation->id }}">
                {{ $designation->name }}
            </option>
        @endforeach

    </select> <br>

    <input type="number" name="salary" placeholder="Salary"><br>

    <!-- Image Upload -->
    <input type="file" name="image"><br>

    <button type="submit">Save</button>
</form>
