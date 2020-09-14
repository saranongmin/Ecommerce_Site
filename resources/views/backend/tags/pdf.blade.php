<h1>Category List</h1>

<table border="1">
    <tr>
        <th>SL#</th>
        <th>Title</th>
    </tr>

    @foreach($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
        </tr>
    @endforeach
</table>
