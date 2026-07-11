<!DOCTYPE html>
<html>

<head>

    <title>
        My Profile
    </title>

</head>


<body>


    <div class="container">


        <h2>
            My Profile
        </h2>


        @if ($employee->image)
            <img src="{{ asset('uploads/employees/' . $employee->image) }}" width="120">
        @endif



        <h3>
            {{ $employee->user->name }}
        </h3>



        <p>
            Email:

            {{ $employee->user->email }}

        </p>



        <p>
            Phone:

            {{ $employee->user->phone }}

        </p>



        <p>
            Employee ID:

            {{ $employee->employee_code }}

        </p>



        <p>
            Department:

            {{ $employee->department->name }}

        </p>



        <p>
            Designation:

            {{ $employee->designation->name }}

        </p>



        <p>
            Joining Date:

            {{ $employee->joining_date }}

        </p>



        <p>
            Salary:

            {{ $employee->salary }}

        </p>



        <p>
            Address:

            {{ $employee->address }}

        </p>


        <p>
            Status:

            {{ $employee->status }}

        </p>



    </div>


</body>

</html>
