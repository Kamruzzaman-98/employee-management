@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Edit Department</h3>
            </div>


        </div>



        <!-- Form -->

        <div class="form-wrapper">


            <form action="{{ route('departments.update', $department->id) }}" method="POST">


                @csrf

                @method('PUT')


                <div class="form-group">


                    <label>
                        Department Name
                    </label>


                    <input type="text" name="name" value="{{ $department->name }}" placeholder="Enter Department Name">


                </div>



                <div class="button-group">


                    <button type="submit" class="btn update-btn">

                        Update Department

                    </button>



                    <a href="{{ route('departments.index') }}" class="btn back-btn">

                        Back

                    </a>


                </div>


            </form>


        </div>


    </div>
@endsection
