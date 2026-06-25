<h2>Designation List</h2>

<a href="{{ route('designations.create') }}">
    Add Designation
</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    @foreach($designations as $designation)
    <tr>
        <td>{{ $designation->id }}</td>

        <td>{{ $designation->name }}</td>

        <td>

            <a href="{{ route('designations.edit',$designation->id) }}">
                Edit
            </a>

            <form
                action="{{ route('designations.destroy',$designation->id) }}"
                method="POST"
                style="display:inline"
            >
                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </td>
    </tr>
    @endforeach

</table>
