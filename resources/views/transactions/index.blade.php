@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary mb-0">Transactions</h2>
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary shadow-sm">
            <i class="fas fa-box-open me-2"></i>Back to Products
        </a>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Transactions Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table align-middle table-hover">
                <thead class="table-light text-uppercase small text-secondary">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $t)
                        <tr>
                            <td class="fw-semibold">{{ $t->id }}</td>
                            <td>{{ $t->user->name ?? 'Guest' }}</td>
                            <td>{{ $t->product->name }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $t->quantity }}</span>
                            </td>
                            <td>₱{{ number_format($t->total, 2) }}</td>
                            <td>{{ $t->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-receipt fa-2x mb-2"></i>
                                <div>No transactions recorded yet.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Subtle styling --}}
<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: all 0.15s ease;
    }
    .badge {
        font-size: 0.85rem;
    }
</style>
@endsection
