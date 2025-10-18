@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary mb-0">Add New Product</h2>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="fas fa-arrow-left me-2"></i>Back to Products
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Stock</label>
                    <input type="number" name="stock" class="form-control" placeholder="Enter available stock" required>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-save me-2"></i>Save Product
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-light border px-4 shadow-sm">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Optional styling --}}
<style>
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
    }
    .btn {
        transition: all 0.2s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
    }
</style>
@endsection
