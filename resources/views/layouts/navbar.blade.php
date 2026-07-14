<div class="navbar">

    <div class="nav-left">

        <h4>
            Employee Management System
        </h4>

    </div>



    <div class="nav-right">


        @auth

            <div class="user-info">


                <div class="user-avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


                <div class="user-details">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>


                </div>


            </div>


        @endauth


    </div>


</div>
