<h2>Add Designation</h2>

<form action="{{ route('designations.store') }}" method="POST">
    @csrf

    <input
        type="text"
        name="name"
        placeholder="Designation Name"
    >

    <button type="submit">
        Save
    </button>
</form>
