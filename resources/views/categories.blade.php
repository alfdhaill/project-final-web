@extends('layouts.app')

@section('content')
<div class="container">

    {{-- add modal --}}

    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add a category</h1>
              <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <ul id="saveform_errList"></ul>
                    <div class="form-group row pt-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control name" id='name'>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                        <label for="admin_id" class="col-sm-2 col-form-label">Admin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control admin_id" id='admin_id' value="{{ Auth::user()->id }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                        <label for="summernote" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control description" id='summernote'>
                            </textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-dark modal-footer">
              <button type="submit" name="submit" class="btn btn-primary add_category">Save</button>
            </div>
          </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-dark text-white">
                <div class="card-body mt-3">
                    <div class="card-title h3 mt-2 text-center">Categories List</div>
                    <table class="text-white table table-dark table-hover table-borderless">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Description</th>
                                @can('isAdmin')
                                <th>Author</th>
                                <th>Added</th>
                                <th>Updated</th>
                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                @can('isAdmin')
                                <td>{{ $item->admin->name ?? 'None' }}</td>
                                <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                <td>{{ date('d M Y', strtotime($item->updated_at)) }}</td>
                                <td>
                                    <form action="{{ route('categories.destroy', $item->id) }}"method="POST">
                                        <a class="btn btn-warning" href="{{ route('categories.edit', $item->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @can('isAdmin')
                    <div class="d-flex justify-content-end pt-2 pb-1">
                        <a href="" class='btn btn-success' data-bs-toggle="modal" data-bs-target="#addCategoryModal">+ Add</a>
                    </div>
                    @endcan
                    @if ($categories->hasPages())
                    <div class="card-footer">
                        {{ $categories->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#summernote').summernote();
    });
</script>
<script>
    $(document).ready(function() {

        $(document).on('click', '.add_category',  function(e){
            e.preventDefault();

            var data = {
                'name': $('.name').val(),
                'admin_id': $('.admin_id').val(),
                'description': $('.description').val(),
            }
            // console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/categories",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#saveform_errList').html();
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                    }
                    else
                    {
                        $('#saveform_errList').html();
                        $('#add_success').addClass('alert alert-success');
                        $('#add_success').text(response.message);
                        $('#addCategoryModal').modal('hide');
                        // fetchtag();

                        // return redirect()->route('tags.index');
                        // $('#addTagModal').find('input').val('');
                    }
                }
            });
        });
    });
</script>
@endsection
