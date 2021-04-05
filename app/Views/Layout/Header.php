<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi SPP SMK Negeri 2 Kuningan">
    <meta name="author" content="Oya Suryana, M.Kom.">
    <title>Aplikasi SPP</title>
    <!-- Bootstrap core CSS -->
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/fontawesome/css/all.min.css" rel="stylesheet">

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
      /* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */

main > .container {
  padding: 60px 15px 0;
}

.footer {
  background-color: #f5f5f5;
}

.footer > .container {
  padding-right: 15px;
  padding-left: 15px;
}

code {
  font-size: 80%;
}

    </style>

    
    <!-- Custom styles for this template -->
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
    <a class="navbar-brand" href="#">AppSPP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <!-- Dropdown -->
        <?php if(session()->get('level')=='admin'){?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <i class="fas fa-database"></i> Master Data
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/petugas/tampil">Petugas</a>
            <a class="dropdown-item" href="/spp">Tarif SPP</a>
            <a class="dropdown-item" href="/kelas">Kelas</a>
            <a class="dropdown-item" href="/siswa">Siswa</a>
        </div>
        </li>        
        <?php } ?>    
        <!-- Dropdown -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <i class="far fa-money-bill-alt"></i> Transaksi
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/bayar">Pembayaran</a>
        </div>
        </li>        

        <!-- Dropdown -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <i class="fas fa-copy"></i> Laporan
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/laporan/form-histori">Histori Pembayaran</a>
          <?php if(session()->get('level')=='admin'){?>
            <a class="dropdown-item" href="/laporan/penerimaan">Laporan Penerimaan</a>
            <a class="dropdown-item" href="/laporan/tunggakan">Laporan Tunggakan</a>
            <?php } ?>  
        </div>
        </li>
  
        <li class="nav-item">
          <a class="nav-link" href="/petugas/logout" data-confirm="Anda yakin akan mengakhiri ?"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>        

    </ul>


    </div>
  </nav>
</header>