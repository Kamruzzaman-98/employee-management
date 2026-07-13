<div class="navbar">

    <h3>Employee Management System</h3>

    <div>

        @auth

            {{ auth()->user()->name }}

        @endauth

    </div>

</div>
