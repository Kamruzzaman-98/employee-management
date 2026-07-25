@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div>
                <h3>Create Role</h3>
            </div>
        </div>

        <!-- Form -->
        <div class="form-wrapper">

            <form action="{{ route('roles.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label>
                        Role Name
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Role Name">

                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="button-group">

                    <button type="submit" class="btn save-btn">
                        Save Role
                    </button>

                    <a href="{{ route('roles.index') }}" class="btn back-btn">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
