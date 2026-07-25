@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Permission Management</h3>
            </div>

            <a href="{{ route('permissions.create') }}" class="add-btn">
                + Add Permission
            </a>

        </div>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="table-wrapper">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Permission Name</th>
                        <th>Guard</th>
                        <th>Created Date</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($permissions as $permission)
                        <tr>

                            <td>{{ $permission->id }}</td>

                            <td>
                                <div class="department-name">
                                    <div class="icon">
                                        🔑
                                    </div>

                                    <span>
                                        {{ $permission->name }}
                                    </span>
                                </div>
                            </td>

                            <td>{{ $permission->guard_name }}</td>

                            <td>{{ $permission->created_at->format('d-m-Y') }}</td>

                            <td>

                                <a href="{{ route('permissions.edit', $permission->id) }}" class="action-btn edit">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="action-btn delete"
                                        onclick="return confirm('Delete permission?')">
                                        🗑 Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="empty">
                                No Permission Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
