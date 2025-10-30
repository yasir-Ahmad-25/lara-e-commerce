@extends('admin.admin_base')

@section('view_categories')

<table class="table table-light table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $index => $category)
        <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $category->category_name }}</td>
            <td>
                <a href="{{ route('admin.categories.edit_category',$category->id)}}" class="btn btn-warning">Edit</a>
                <a href="{{ route('admin.delete_category',$category->id)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection