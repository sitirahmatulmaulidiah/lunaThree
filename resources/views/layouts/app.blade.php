<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Wisata Banjarmasin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background-image: url('/images/menara.jpg');
      background-size: cover;
      background-position: center;
      height: 500px;
      position: relative;
      color: white;
    }
    .hero-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: left;
      max-width: 600px;
    }
    .card-img-top {
      height: 150px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">Luntanée Wisata</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Wisata</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Event</a></li>
        <li class="nav-item"><a class="btn btn-outline-success ms-2" href="#">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

@yield('content')

<!-- Footer -->
<footer class="text-center bg-info text-white py-3 mt-5">
  Footer
</footer>
<!-- End Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
