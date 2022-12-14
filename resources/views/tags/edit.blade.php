@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please fill the form correctly!</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@can('isAdmin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-dark text-white">
                <div class="card-header fw-bold bg-warning">Edit tag</div>
                <div class="card-body mt-3">
                    <form action="{{ route('categories.update', $tag->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row pt-3">
                            <label for="name" class="col-sm-2 col-form-label text-white">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id='name' value="{{ $tag->name }}">
                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <label for="admin_id" class="col-sm-2 col-form-label text-white">Admin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="admin_id" id='admin_id' value="{{ Auth::user()->id }}" readonly>
                            </div>
                        </div>
                        {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                        <div class="form-group row pt-3">
                            <label for="summernote" class="col-sm-2 col-form-label text-white">Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="description" id='summernote' value='{{ $tag->description }}'>
                                </textarea>
                            </div>
                        </div>
                        <div class='pb-1 d-flex justify-content-end pt-3'>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection
