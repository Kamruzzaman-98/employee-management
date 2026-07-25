@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div>
                <h3>Assign Permission</h3>
            </div>
        </div>

        <!-- Form -->
        <div class="form-wrapper">

            <div class="form-group">
                <label>
                    Role
                </label>

                <input type="text" value="{{ $role->name }}" disabled>
            </div>

            <form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">

                @csrf

                <div class="form-group">

                    <label>
                        Permissions
                    </label>

                    <div class="permission-box">

                        @foreach ($permissions as $permission)
                            <label class="permission-item">

                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                                <span class="permission-name">
                                    {{ $permission->name }}
                                </span>

                            </label>
                        @endforeach

                    </div>

                </div>

                <div class="button-group">

                    <button type="submit" class="btn save-btn">
                        Save Permission
                    </button>

                    <a href="{{ route('roles.index') }}" class="btn back-btn">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
