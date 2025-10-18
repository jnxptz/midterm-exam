@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-secondary">Dashboard Overview</h1>

    <div class="row g-4">
        {{-- Products --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom" style="border-left: 5px solid #0d6efd;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase mb-2">Products</h6>
                        <h3 class="fw-bold mb-0">{{ $totalProducts }}</h3>
                    </div>
                    <div class="text-primary fs-3">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Transactions --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom" style="border-left: 5px solid #198754;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase mb-2">Transactions</h6>
                        <h3 class="fw-bold mb-0">{{ $totalTransactions }}</h3>
                    </div>
                    <div class="text-success fs-3">
                        <i class="fas fa-receipt"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Sales --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom" style="border-left: 5px solid #ffc107;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase mb-2">Total Sales</h6>
                        <h3 class="fw-bold mb-0">₱{{ number_format($totalSales, 2) }}</h3>
                    </div>
                    <div class="text-warning fs-3">
                        <i class="fas fa-coins"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Low Stock --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom" style="border-left: 5px solid #dc3545;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase mb-2">Low Stock</h6>
                        <h3 class="fw-bold mb-0">{{ $lowStock }}</h3>
                    </div>
                    <div class="text-danger fs-3">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Actions --}}
    <div class="mt-5 d-flex gap-3">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="fas fa-boxes me-2"></i>Manage Products
        </a>
        <a href="{{ route('transactions.index') }}" class="btn btn-success btn-lg shadow-sm">
            <i class="fas fa-list me-2"></i>View Transactions
        </a>
    </div>
</div>

{{-- Hover animation --}}
<style>
    .hover-zoom {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-zoom:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
