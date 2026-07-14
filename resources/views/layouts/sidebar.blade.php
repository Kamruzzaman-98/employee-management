<div class="sidebar">

    <div class="logo">
        <h2>EMS</h2>
        <p>Employee Management</p>
    </div>

    <ul class="menu">

        <li>
            <a href="{{ route('dashboard') }}">
                🏠 Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('departments.index') }}">
                🏢 Departments
            </a>
        </li>

        <li>
            <a href="{{ route('designations.index') }}">
                💼 Designations
            </a>
        </li>

        <li>
            <a href="{{ route('employees.index') }}">
                👨‍💼 Employees
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('attendances.index') }}">
                🕒 Attendance
            </a>
        </li> --}}

        <li>
            <a href="{{ route('leaves.index') }}">
                🍃 Leave Management
            </a>
        </li>

        <li>
            <a href="{{ route('holidays.index') }}">
                🎉 Holidays
            </a>
        </li>

        <li>
            <a href="{{ route('notices.index') }}">
                📢 Notice Board
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('payrolls.index') }}">
                💰 Payroll
            </a>
        </li> --}}

        {{-- <li>
            <a href="{{ route('documents.index') }}">
                📂 Documents
            </a>
        </li> --}}

        {{-- <li>
            <a href="{{ route('reports.index') }}">
                📊 Reports
            </a>
        </li> --}}

        {{-- <li>
            <a href="{{ route('profile.index') }}">
                👤 Profile
            </a>
        </li> --}}

        <li>
            <a href="{{ route('logout') }}">
                🚪 Logout
            </a>
        </li>

    </ul>

</div>
