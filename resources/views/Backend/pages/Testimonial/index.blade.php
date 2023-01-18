@extends('Backend.layouts.master')

@section('title')Testimonial   Index @endsection

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
    <h1>Testimonial List Table</h1>
    <div class="col-12">
        <div class="d-flex justify-content-end">
          <a href="{{ route('testimonial.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i>
            Add New Testimonial
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
                        <th scope="col">Client Image</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Client Designation</th>
                        <th scope="col">Options</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial )
                    <tr>
                        <td scope="row">{{ $testimonials->firstItem()+$loop->index }}</td>
                         <td>{{ $testimonial->updated_at->format('d M Y') }}</td>
                         <td>
                           <img src="{{ asset('Uploads/testmonials') }}/{{ $testimonial->client_image }}" alt=""
                           class="w-25 img-fluid rounded-circle" >
                        </td>
                         <td>{{ $testimonial->client_name }}</td>
                         <td>{{ $testimonial->client_designation }}</td>
                         <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Setting</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('testimonial.edit',$testimonial->client_name_slug) }}"><i class="fas fa-edit"></i>Edit</a></li>
                                    <li>
                                         <form action="{{ route('testimonial.destroy',$testimonial->client_name_slug) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item show_confirm" type="submit" ><i class="fas fa-trash"></i>Delete</button>
                                         </form>
                                    </li>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable( {
        select: true
    } );

    $('.show_confirm').click(function(event){
        let form =$(this).closest('form');
        event.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    })
} );
</script>
@endpush
