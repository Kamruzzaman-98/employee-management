@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div>
                <h3>Create Permission</h3>
            </div>
        </div>

        <!-- Form -->
        <div class="form-wrapper">

            <form action="{{ route('permissions.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label>
                        Permission Name
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Example: employee-create">

                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="button-group">

                    <button type="submit" class="btn save-btn">
                        Save Permission
                    </button>

                    <a href="{{ route('permissions.index') }}" class="btn back-btn">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
