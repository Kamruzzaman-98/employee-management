@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Role Management</h3>
            </div>

            <a href="{{ route('roles.create') }}" class="add-btn">
                + Add Role
            </a>

        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert-success" style="margin:15px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="table-wrapper">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Guard Name</th>
                        <th>Created Date</th>
                        <th width="250">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($roles as $role)
                        <tr>

                            <td>{{ $role->id }}</td>

                            <td>
                                <div class="department-name">
                                    <div class="icon">🔐</div>
                                    <span>{{ $role->name }}</span>
                                </div>
                            </td>

                            <td>{{ $role->guard_name }}</td>

                            <td>{{ $role->created_at->format('d-m-Y') }}</td>

                            <td>

                                <a href="{{ route('roles.edit', $role->id) }}" class="action-btn edit">
                                    ✏ Edit
                                </a>

                                <a href="{{ route('roles.permissions', $role->id) }}" class="action-btn view">
                                    🔑 Permission
                                </a>

                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="action-btn delete"
                                        onclick="return confirm('Are you sure delete this role?')">
                                        🗑 Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="empty">
                                No Role Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
