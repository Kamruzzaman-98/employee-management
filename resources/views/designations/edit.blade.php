<h2>Edit Designation</h2>

<form
    action="{{ route('designations.update',$designation->id) }}"
    method="POST"
>
    @csrf
    @method('PUT')

    <input
        type="text"
        name="name"
        value="{{ $designation->name }}"
    >

    <button type="submit">
        Update
    </button>
</form>
