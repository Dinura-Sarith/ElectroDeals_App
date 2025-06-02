@extends('layout')
@section('content')

<div class="container">
    <h3 class="text-center mb-4">Category Management</h3>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form-area shadow-sm">
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" required placeholder="Enter category name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option disabled selected>Select status</option>
                                <option value="1">True</option>
                                <option value="2">False</option>
                            </select>
                        </div>
                        <div class="col-12 text-end mt-3">
                            <button type="submit" class="btn btn-primary">Register Category</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive mt-5">
                <table class="table table-bordered table-striped align-middle text-center shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <span class="badge {{ $category->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $category->status == 1 ? 'True' : 'False' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@push('css')
<style>
    .form-area {
        background-color: #ffffff;
        padding: 25px;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    h3 {
        font-weight: 600;
        color: #343a40;
    }

    .table thead th {
        vertical-align: middle;
    }
</style>
@endpush

@endsection
