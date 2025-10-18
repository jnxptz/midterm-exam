<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('dashboard') }}">
      <i class="fas fa-paw me-2 text-warning"></i> TPS
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto d-flex align-items-center">
        <li class="nav-item mx-1">
          <a class="nav-link px-3 rounded {{ request()->routeIs('dashboard') ? 'active-nav' : '' }}" href="{{ route('dashboard') }}">
            <i class="fas fa-chart-line me-1"></i> Dashboard
          </a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link px-3 rounded {{ request()->routeIs('products.*') ? 'active-nav' : '' }}" href="{{ route('products.index') }}">
            <i class="fas fa-box me-1"></i> Products
          </a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link px-3 rounded {{ request()->routeIs('transactions.*') ? 'active-nav' : '' }}" href="{{ route('transactions.index') }}">
            <i class="fas fa-receipt me-1"></i> Transactions
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4 mb-5">
    @yield('content')
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
  .nav-link {
    color: #ccc !important;
    font-weight: 500;
    transition: all 0.2s ease;
  }
  .nav-link:hover {
    color: #fff !important;
    background: rgba(255, 255, 255, 0.1);
  }
  .active-nav {
    color: #fff !important;
    background-color: #0d6efd !important;
  }
  .navbar-brand {
    font-size: 1.25rem;
    letter-spacing: 0.5px;
  }
</style>
</body>
</html>
