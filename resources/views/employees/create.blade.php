<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Name"><br>

    <input type="email" name="email" placeholder="Email"><br>

    <input type="text" name="phone" placeholder="Phone"><br>

    <input type="text" name="designation" placeholder="Designation"><br>

    <input type="number" name="salary" placeholder="Salary"><br>

    <!-- Image Upload -->
    <input type="file" name="image"><br>

    <button type="submit">Save</button>
</form>
