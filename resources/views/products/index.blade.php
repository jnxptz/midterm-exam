@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-secondary">Product List</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus me-2"></i>Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr class="text-secondary text-uppercase small">
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th class="text-center">Buy</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $p)
                        <tr>
                            <td class="fw-semibold">{{ $p->name }}</td>
                            <td>₱{{ number_format($p->price, 2) }}</td>
                            <td>
                                @if($p->stock <= 5)
                                    <span class="badge bg-danger">Low ({{ $p->stock }})</span>
                                @else
                                    <span class="badge bg-success">{{ $p->stock }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('transactions.store') }}" class="d-inline-flex align-items-center justify-content-center">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                                    <input 
                                        type="number" 
                                        name="quantity" 
                                        class="form-control form-control-sm me-2 text-center" 
                                        min="1" 
                                        max="{{ $p->stock }}" 
                                        placeholder="Qty"
                                        style="width: 80px;"
                                        required
                                    >
                                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-shopping-cart me-1"></i>Buy
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="fas fa-box-open fa-2x mb-2"></i>
                                <div>No products available.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Optional hover and animation styling --}}
<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        transition: all 0.15s ease;
    }
</style>
@endsection
