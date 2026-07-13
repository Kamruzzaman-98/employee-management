@extends('layouts.app')

@section('content')
    <div class="container">

        <div style="display:flex; justify-content:space-between; align-items:center;">

            <h2>Department List</h2>

            <a href="{{ route('departments.create') }}" class="btn add-btn">
                + Add Department
            </a>

        </div>


        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th width="180">Action</th>
                </tr>

            </thead>


            <tbody>

                @foreach ($departments as $department)
                    <tr>

                        <td>
                            {{ $department->id }}
                        </td>


                        <td>
                            {{ $department->name }}
                        </td>


                        <td>

                            <a href="{{ route('departments.edit', $department->id) }}" class="btn edit-btn">

                                Edit

                            </a>


                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                style="display:inline;">

                                @csrf

                                @method('DELETE')


                                <button type="submit" class="btn delete-btn" onclick="return confirm('Are you sure?')">

                                    Delete

                                </button>


                            </form>


                        </td>


                    </tr>
                @endforeach


            </tbody>


        </table>


    </div>
@endsection
