@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div>
                <h3>Edit Role</h3>
            </div>
        </div>

        <!-- Form -->
        <div class="form-wrapper">

            <form action="{{ route('roles.update', $role->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label>
                        Role Name
                    </label>

                    <input type="text" name="name" value="{{ old('name', $role->name) }}" placeholder="Enter Role Name">

                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="button-group">

                    <button type="submit" class="btn update-btn">
                        Update Role
                    </button>

                    <a href="{{ route('roles.index') }}" class="btn back-btn">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
