
<!DOCTYPE html>
<html lang="en">
  <head>

  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/components.css">

    <title></title>
  </head>

  </html>  

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="img/avatar/avatar-1.png" class="rounded-circle mr-1">
            Halo <b>petugas1</b> Anda adalah <b>petugas</b></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>Sistem Informasi Nilai</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>MN</a>
          </div>
          <ul class="sidebar-menu">
              <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li>
                <a href="dashboard.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Fitur</li>
              <li><a class="nav-link" href="tambah_nilai.php"><i class="fas fa-money-check-alt"></i> <span>Input Nilai</span></a></li>
              <li><a class="nav-link" href="tampil_nilai.php"><i class="fas fa-book"></i> <span>Data Nilai</span></a></li>
        </aside>
      </div>
      
      <!-- General JS Scripts -->
  <script src="bootstrap/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/popper.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <script src="bootstrap/jquery.nicescroll.min.js"></script>
  <script src="bootstrap/moment.min.js"></script>
  <script src="bootstrap/stisla.js"></script>

  <!-- Template JS File -->
  <script src="bootstrap/scripts.js"></script>
  <script src="bootstrap/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="bootstrap/page/index.js"></script> <!-- Main Content -->
      <div class="main-content bg-primary">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">DATA KELAS -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">TI 4C</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Pilih Kelas</li>
                        <li><a href="kelas.php" class="dropdown-item active">TI 4C</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">29</div>
                      <div class="card-stats-item-label">Mahasiswa</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">29</div>
                      <div class="card-stats-item-label">Lulus</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">0</div>
                      <div class="card-stats-item-label">Lulus</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-info bg-primary">
                  <i class="fas fa-users"></i>
                
        </section>
      </div>
    </div>
  </div>
</body>
