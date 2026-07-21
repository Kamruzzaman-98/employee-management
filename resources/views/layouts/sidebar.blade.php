<div class="sidebar">

    <div class="logo">
        <h2>EMS</h2>
        <p>Employee Management</p>
    </div>

    <ul class="menu">
        @can('dashboard-view')
            <li>
                <a href="{{ route('dashboard') }}">
                    🏠 Dashboard
                </a>
            </li>
        @endcan

        @can('department-view')
            <li>
                <a href="{{ route('departments.index') }}">
                    🏢 Departments
                </a>
            </li>
        @endcan

        @can('designation-view')
            <li>
                <a href="{{ route('designations.index') }}">
                    💼 Designations
                </a>
            </li>
        @endcan

        <li>
            <a href="{{ route('employees.index') }}">
                👨‍💼 Employees
            </a>
        </li>

        <li>
            <a href="{{ route('attendance.index') }}">
                🕒 Attendance
            </a>
        </li>

        <li class="has-submenu">

            <a href="#">
                🍃 Leave Management ▼
            </a>

            <ul class="submenu">

                <li>
                    <a href="{{ route('leave.index') }}">
                        Leave Request
                    </a>
                </li>

                <li>
                    <a href="{{ route('leaves.index') }}">
                        Leave List
                    </a>
                </li>

                <li>
                    <a href="{{ route('leave-types.index') }}">
                        Leave Types
                    </a>
                </li>

            </ul>

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
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                🚪 Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </li>

    </ul>

</div>
