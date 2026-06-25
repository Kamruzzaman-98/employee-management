<form action="{{route('departments.store')}}" method="POST">
    @csrf
    <div>
        Name:
        <input type="text" name="name">
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
