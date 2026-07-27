@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div>
                <h3>Edit Permission</h3>
            </div>
        </div>

        <!-- Form -->
        <div class="form-wrapper">

            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label>
                        Permission Name
                    </label>

                    <input type="text" name="name" value="{{ old('name', $permission->name) }}"
                        placeholder="Enter Permission Name">

                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="button-group">

                    <button type="submit" class="btn update-btn">
                        Update Permission
                    </button>

                    <a href="{{ route('permissions.index') }}" class="btn back-btn">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
