<h1>
    Holiday List
</h1>


<table>
    <thead>
        <tr>ID</tr>
        <tr>Holiday</tr>
        <tr>Description</tr>
        <tr>Status</tr>
    </thead>
    <tbody>
        @forelse ($holidays as $holiday)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $holiday -> id }}</td>
            <td>{{ $holiday -> title }}</td>
            <td>{{ $holiday -> description }}</td>
            <td>{{ $holiday -> Status }}</td>
        </tr>

        @empty

        @endforelse
    </tbody>
</table>
