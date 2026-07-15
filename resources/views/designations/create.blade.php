@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Add Designation</h3>
            </div>


        </div>



        <!-- Form -->

        <div class="form-wrapper">


            <form action="{{ route('designations.store') }}" method="POST">


                @csrf


                <div class="form-group">


                    <label>
                        Designation Name
                    </label>


                    <input type="text" name="name" placeholder="Enter Designation Name">


                </div>



                <div class="button-group">


                    <button type="submit" class="btn save-btn">

                        Save Designation

                    </button>



                    <a href="{{ route('designations.index') }}" class="btn back-btn">

                        Back

                    </a>


                </div>


            </form>


        </div>


    </div>
@endsection
