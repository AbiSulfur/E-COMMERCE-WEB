<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="images/png" href="gambar/favicon.png">
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="HOMEPAGE CSS (2).css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Knewave&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <title>Leafly</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="gambar/8-removebg-preview.png" alt="Logo" width="65"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="gambar/8-removebg-preview.png" alt="Logo" width="50"></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link max-lg-2" aria-current="page" href="#Home"><b>Home</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link max-lg-2" href="#About"><b>About</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link max-lg-2" href="#Product"><b>Product</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link max-lg-2" href="#Team"><b>Our Team</b></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Tombol Login -->
    <!-- Tombol Login / Logout & Username (Inline Style) -->
    <?php if (isset($_SESSION['status']) && $_SESSION['status'] === "login"): ?>
      <!-- Jika sudah login -->
      <div style="display: flex; align-items: center; gap: 10px; margin-right: 20px;">
        <!-- Ikon user (Font Awesome) -->
        <i class="fa-regular fa-user" style="font-size: 1.2rem; color: #fff;"></i>

        <!-- Tampilkan username -->
        <span style="color: #fff; font-weight: bold;">
          <?php echo htmlspecialchars($_SESSION['username']); ?>
        </span>

        <!-- Tombol Logout -->
        <a href="Logout.php" class="btn btn-light">Logout</a>
      </div>
    <?php else: ?>
      <!-- Jika belum login -->
      <div style="margin-right: 20px;">
        <a href="Index Pertama.php" class="btn btn-light">Login</a>
      </div>
    <?php endif; ?>
    <!-- End of Tombol Login/Logout -->
    <!-- Tombol Login -->
  </nav>
  <!-- End Of Navbar -->

  <!-- Banner -->
  <section class="hero-section" id="Home">
    <div class="container d-flex align-item-center justify-content-center fs-1 text-white flex-column">
      <h1>Nikmati Hari-Harimu</h1>
      <h1>Bersama Kami</h1>
    </div>
  </section>
  <!-- End Of Banner -->

  <!-- Content -->
  <section class="content-section" id="About">
    <div class="container d-flex align-item-center justify-content-center fs-1 text-white flex-column">
      <h1>Tentang Kami</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur magnam natus, nam aut amet rerum odio? Velit ipsum modi maxime, eveniet commodi, rerum neque quisquam fuga autem esse, ullam repellendus!</p>
    </div>
  </section>
  <!-- End Of -->

  <!-- Product -->
  <section class="product" id="Product">
    <div class="container mt-5">
      <h1 class="text-center mb-5">Produk Kami</h1>
      <div class="row row-cols-1 row-cols-md-4 mb-5 g-4">
        <div class="col">
          <div class="card product-card">
            <img src="gambar/Desain_tanpa_judul__19_-removebg-preview.png" class="card-img-top product-img" alt="Lemon Tea">
            <div class="card-body">
              <h5 class="card-title">Original</h5>
              <p class="card-text">Rp. 6000</p>
              <a href="#Product" class="btn btn-dark mb-3">ADD TO CART</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card product-card">
            <img src="gambar/Desain_tanpa_judul__5_-removebg-preview.jpg" class="card-img-top product-img" alt="Green Tea">
            <div class="card-body">
              <h5 class="card-title">Green Tea</h5>
              <p class="card-text">Rp. 8.000</p>
              <a href="#Product" class="btn btn-dark mb-3">ADD TO CART</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card product-card">
            <img src="gambar/Desain_tanpa_judul__5_-removebg-preview.png" class="card-img-top product-img" alt="Green Tea">
            <div class="card-body">
              <h5 class="card-title">Lemon Tea</h5>
              <p class="card-text">Rp. 8.000</p>
              <a href="#Product" class="btn btn-dark mb-3">ADD TO CART</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card product-card">
            <img src="gambar/Desain_tanpa_judul__20_-removebg-preview.png" class="card-img-top product-img" alt="Green Tea">
            <div class="card-body">
              <h5 class="card-title">Milk Tea</h5>
              <p class="card-text">Rp. 8.000</p>
              <a href="#Product" class="btn btn-dark mb-3">ADD TO CART</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Of Product -->

  <!-- Proflie -->
  <section class="profile" id="Team">
    <div class="container">
      <h1 class="text-center mb-5">Our Team</h1>
      <div class="row justify-content-center">

        <!-- Card 1 -->
        <div class="col-md-4 d-flex justify-content-center">
          <div class="profile-card custom-card">
            <div class="profile-img">
              <img src="gambar/3.png" alt="Fabian">
            </div>
            <div class="profile-content">
              <h3>Fabian Rizky Pratama</h3>
              <p>
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 d-flex justify-content-center">
          <div class="profile-card custom-card">
            <div class="profile-img">
              <img src="gambar/5.png" alt="Abigail">
            </div>
            <div class="profile-content">
              <h3>Benedictus Abigail Triwiyatno</h3>
              <p>
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 d-flex justify-content-center">
          <div class="profile-card custom-card">
            <div class="profile-img">
              <img src="gambar/4.png" alt="Juan">
            </div>
            <div class="profile-content">
              <h3>Juan Roman Requelme</h3>
              <p>
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End Of Proflie -->

  <!-- Proflie -->
  <section class="profile" id="Team">
    <div class="container">
      <h1 class="text-center mb-5">Brand Ambassador</h1>
      <div class="row justify-content-center">

        <!-- Card 1 -->
        <div class="col-md-4 d-flex justify-content-center">
          <div class="profile-card custom-card">
            <div class="profile-img">
              <img src="gambar/Vika 1.jpg" alt="Vika">
            </div>
            <div class="profile-content">
              <h3>Maria Devika Adiputri</h3>
              <p>
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
              </p>

            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 d-flex justify-content-center">
          <div class="profile-card custom-card">
            <div class="profile-img">
              <img src="gambar/Bu Wati.jpg" alt="Bu Wati">
            </div>
            <div class="profile-content">
              <h3>Mutafiah Wirawati</h3>
              <p>
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 d-flex justify-content-center">
          <div class="profile-card custom-card">
            <div class="profile-img">
              <img src="gambar/Slamet.jpg" alt="Alden">
            </div>
            <div class="profile-content">
              <h3>Ignatius Alden</h3>
              <p>
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End Of Proflie -->

  <!-- Footer -->
  <footer class="footer" id="Footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>company</h4>
          <ul>
            <li><a href="#Footer">about us</a></li>
            <li><a href="#Footer">our services</a></li>
            <li><a href="#Footer">privacy policy</a></li>
            <li><a href="#Footer">affiliate program</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>get help</h4>
          <ul>
            <li><a href="#Footer">FAQ</a></li>
            <li><a href="#Footer">shipping</a></li>
            <li><a href="#Footer">returns</a></li>
            <li><a href="#Footer">order status</a></li>
            <li><a href="#Footer">payment options</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>costumer services</h4>
          <ul>
            <li><a href="#Footer">watch</a></li>
            <li><a href="#Footer">bag</a></li>
            <li><a href="#Footer">shoes</a></li>
            <li><a href="#Footer">dress</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>follow us</h4>
          <div class="social-links">
            <a href="#Footer"><i class="fab fa-facebook-f"></i></a>
            <a href="#Footer"><i class="fab fa-twitter"></i></a>
            <a href="#Footer"><i class="fab fa-instagram"></i></a>
            <a href="#Footer"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Of Footer -->

  <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/1c415f7297.js" crossorigin="anonymous"></script>
</body>

</html>