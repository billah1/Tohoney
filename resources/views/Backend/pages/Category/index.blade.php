@extends('Backend.layouts.master')

@section('title')Category Index @endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<style>
    .dataTables_length{
        padding: 20px 0;
    }
</style>
@endpush

@section('admin_content')
<div class="row">
    <h1>Category List Table</h1>
    <div class="col-12">
        <div class="d-flex justify-content-end">
          <a href="{{ route('category.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i>
            Add New Category
        </a>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive my-2">
            <table id="dataTable" class="table table-boardered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Last Modified</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Slug</th>
                        <th scope="col">Options</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <td scope="row">{{ $categories->firstItem()+$loop->index }}</td>
                         <td>{{ $category->updated_at->format('d M Y') }}</td>
                         <td>{{ $category->title }}</td>
                         <td>{{ $category->slug }}</td>
                         <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Setting</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit"></i>Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-trash"></i>Delete</a></li>

                                </ul>
                            </div>
                         </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('admin_script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>

<script>
    $(document).ready(function() {
    $('#dataTable').DataTable( {
        select: true
    } );
} );
</script>
@endpush