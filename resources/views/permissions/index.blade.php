<h1>
    Permission List
</h1>

<table>
    <thead>
        <th>ID</th>
        <th>Permission Name</th>
    </thead>

    <tbody>
        @forelse ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
            </tr>
        @empty

            <tr>
                <td>No permission found</td>
            </tr>
        @endforelse
    </tbody>
</table>
