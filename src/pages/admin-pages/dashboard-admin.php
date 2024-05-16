<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .nav-active {
        background-color: #fff;
        color: rgba(var(--bs-danger-rgb),var(--bs-bg-opacity))!important;
        }

        #main {
        padding-top: 4rem;
        }
    </style>
</head>
<body>

<div class="d-flex min-vh-100">
    <section id="sidebar" class="min-vh-100 bg-danger fixed-top" style="width: 300px;">
      <div class="d-flex flex-column px-4">
        <a href="" class="text-decoration-none text-white mt-4 text-center">
          <i class="bi bi-bicycle d-block text-center" style="font-size: 2rem;"></i>
          <span class="fs-4">Peminjaman Sepeda</span>
        </a>
        <hr class="border border-white border-1 w-100">
        <ul class="nav nav-pills flex-column mb-auto gap-1">
            <li class="nav-item">
              <a href="index-admin.php?page=index-admin.php&&employee_id=1" class="nav-link <?= isset($_GET['page']) && $_GET['page'] == 'daftar-sepeda' || isset($_GET['page']) && $_GET['page'] && $_GET['page'] == 'pinjam-sepeda' ? 'nav-active' : 'text-white' ?>">
                <i class="bi bi-bezier2" width="16" height="16"></i>
                <span class="ms-3">Pinjam Sepeda</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=tambah-sepeda" class="nav-link <?= isset($_GET['page']) && $_GET['page'] == 'tambah-sepeda' ? 'nav-active' : 'text-white' ?>">
                <i class="bi bi-file-earmark-plus" width="16" height="16"></i>
                <span class="ms-3">Tambah Sepeda</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=kelola-sepeda" class="nav-link <?= isset($_GET['page']) && $_GET['page'] == 'kelola-sepeda' ? 'nav-active' : 'text-white' ?>">
                <i class="bi bi-bicycle" width="16" height="16"></i>
                <span class="ms-3">Kelola Sepeda</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=laporan" class="nav-link <?= isset($_GET['page']) && $_GET['page'] == 'laporan' ? 'nav-active' : 'text-white' ?>">
                <i class="bi bi-file-earmark-text" width="16" height="16"></i>
                <span class="ms-3">Laporan Peminjaman</span>
              </a>
            </li>
          </ul>
      </div>
    </section>
    <main id="main" class="min-vh-100 bg-light" style="width: calc(100% - 300px); position: absolute; left: 300px;">
      <?php 
        if(isset($_GET['page'])) {
          switch($_GET['page']) {
            // case 'tambah-sepeda' :
            //   include 'detail-pengaduan.php?pengaduan_id=1&&employee_id=1';
            //   break;
            // case 'kelola-sepeda' :
            //   include 'pages/kelola-sepeda.php';
            //   break;
            // case 'edit-sepeda' :
            //   include 'pages/edit-sepeda.php';
            //   break;
            // case 'hapus-sepeda' :
            //   include 'pages/hapus-sepeda.php';
            //   break;
            // case 'daftar-sepeda' :
            //   include 'pages/daftar-sepeda.php';
            //   break;
            case 'pinjam-sepeda' :
              include 'index-admin.php';
              break;
            // case 'laporan' :
            //   include 'pages/laporan.php';
            //   break;
            // default :
            //   include 'pages/index.php';
            //   break;
          }
        } else {
        //   include 'pages/index.php';
        }
        
      ?>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>