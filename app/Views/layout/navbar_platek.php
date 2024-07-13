<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #FFF5DA;">
    <div class="container">
      <a class="navbar-brand align-items-baseline" href="<?= base_url() ?>">
        <img src="<?= base_url('assets/images/logo.svg') ?>" alt="Logo" height="30">
        <strong class="ms-2">
          Kemakom
        </strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item ms-lg-2">
            <a class="nav-link fw-bold" href="<?= base_url() ?>">Home</a>
          </li>
          <li class="nav-item ms-lg-2">
            <a class="nav-link fw-bold" href="#about">About</a>
          </li>
          <li class="nav-item ms-lg-2">
            <a class="nav-link fw-bold" href="#contact">Contact</a>
          </li>
          <li class="nav-item ms-lg-2">
            <a class="nav-link fw-bold btn register-button" href="#daftar">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</body>

</html>