<?php
/**
 * @var string $title
 * @var array $kategori
 * @var array $produk
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        body {
            background: #050816;
            font-family: 'Poppins', sans-serif;
            color: white;
            overflow-x: hidden;
        }

        /* Glow Background */
        body::before {
            content: '';
            position: fixed;
            width: 500px;
            height: 500px;
            background: rgba(0, 255, 255, 0.08);
            top: -200px;
            left: -100px;
            border-radius: 50%;
            filter: blur(100px);
            z-index: -1;
        }

        body::after {
            content: '';
            position: fixed;
            width: 400px;
            height: 400px;
            background: rgba(255, 0, 255, 0.08);
            bottom: -150px;
            right: -100px;
            border-radius: 50%;
            filter: blur(100px);
            z-index: -1;
        }

        /* Navbar */
        .navbar {
            background: rgba(10, 10, 20, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,255,255,0.2);
        }

        .navbar-brand {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            color: #00ffff !important;
            text-shadow: 0 0 10px #00ffff;
        }

        .nav-link {
            color: #cbd5e1 !important;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #00ffff !important;
            text-shadow: 0 0 10px #00ffff;
        }

        /* Hero */
        .hero-card {
            position: relative;
            background:
                linear-gradient(135deg,
                    rgba(0,255,255,0.12),
                    rgba(255,0,255,0.10));
            border: 1px solid rgba(0,255,255,0.3);
            border-radius: 25px;
            overflow: hidden;
            backdrop-filter: blur(20px);
            box-shadow:
                0 0 20px rgba(0,255,255,0.15),
                0 0 50px rgba(255,0,255,0.1);
        }

        .hero-card::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            top: 0;
            left: 0;
            background: linear-gradient(
                90deg,
                #00ffff,
                #ff00ff,
                #00ffff
            );
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            color: #00ffff;
            text-shadow:
                0 0 10px #00ffff,
                0 0 25px #00ffff;
            font-size: 2rem;
        }

        .hero-title span {
            color: #ff00ff;
            text-shadow:
                0 0 10px #ff00ff,
                0 0 25px #ff00ff;
        }

        .hero-text {
            color: #cbd5e1;
        }

        /* Table Card */
.table-card {
    background: #050505;
    border: 1px solid rgba(0,255,255,0.18);
    border-radius: 25px;
    backdrop-filter: blur(15px);
    overflow: hidden;
    box-shadow:
        0 0 25px rgba(0,255,255,0.08);
}

/* Table */
.table {
    color: white !important;
    margin-bottom: 0;
    background: #050505 !important;
}

/* Table Responsive */
.table-responsive {
    background: #050505 !important;
    border-radius: 20px;
}

/* Table Header */
.table thead {
    background: rgba(0,255,255,0.08) !important;
}

.table thead th {
    border: none;
    color: #00ffff;
    font-family: 'Orbitron', sans-serif;
    padding: 18px;
    background: rgba(0,255,255,0.08) !important;
}

/* Table Body */
.table tbody {
    background: #050505 !important;
}

.table tbody tr {
    background: #050505 !important;
    border-color: rgba(255,255,255,0.05);
    transition: 0.3s;
}

.table tbody tr:hover {
    background: rgba(0,255,255,0.06) !important;
}

.table td {
    padding: 18px;
    vertical-align: middle;
    color: #e2e8f0 !important;
    background: #050505 !important;
}
.table > :not(caption) > * > * {
    background-color: transparent !important;
}

        /* Buttons */
        .btn-cyber {
            background: transparent;
            border: 1px solid #00ffff;
            color: #00ffff;
            border-radius: 12px;
            transition: 0.3s;
            font-weight: 500;
        }

        .btn-cyber:hover {
            background: #00ffff;
            color: black;
            box-shadow: 0 0 15px #00ffff;
        }

        .btn-edit {
            background: rgba(255, 193, 7, 0.12);
            border: 1px solid #ffc107;
            color: #ffc107;
            border-radius: 10px;
        }

        .btn-edit:hover {
            background: #ffc107;
            color: black;
            box-shadow: 0 0 15px #ffc107;
        }

        .btn-delete {
            background: rgba(255, 0, 90, 0.1);
            border: 1px solid #ff0055;
            color: #ff0055;
            border-radius: 10px;
        }

        .btn-delete:hover {
            background: #ff0055;
            color: white;
            box-shadow: 0 0 15px #ff0055;
        }

        /* Alert */
        .alert-cyber {
            background: rgba(0,255,255,0.08);
            border: 1px solid rgba(0,255,255,0.3);
            color: #00ffff;
            border-radius: 15px;
        }

        /* Section */
        .section-title {
            font-family: 'Orbitron', sans-serif;
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
        }

        .text-muted-custom {
            color: #94a3b8;
        }
    </style>
</head>

<body class="bg-black">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3 ">

        <div class="container">

            <a class="navbar-brand" href="/dashboard">
                <i class="bi bi-cpu-fill me-2"></i>
                CYBER ELECTRO
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="/produk">
                            Produk
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                        <a href="/logout"
                            class="btn btn-danger rounded-pill px-4">

                            Logout

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Content -->
    <div class="container py-5">

        <!-- Hero -->
        <div class="hero-card p-5 mb-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h1 class="hero-title">
                        PRODUCT
                        <span>DATABASE</span>
                    </h1>

                    <p class="hero-text mt-4">
                        Kelola seluruh inventaris elektronik,
                        monitor stok barang, dan kontrol data
                        produk cyber store Anda secara realtime.
                    </p>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <i class="bi bi-hdd-network"
                        style="
                            font-size: 8rem;
                            color: #00ffff;
                            text-shadow:
                                0 0 20px #00ffff,
                                0 0 40px #00ffff;
                        ">
                    </i>

                </div>

            </div>

        </div>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>

                <h3 class="section-title mb-1">
                    DAFTAR PRODUK
                </h3>

                <p class="text-muted-custom mb-0">
                    Halo, <strong><?= user()->username; ?></strong>
                </p>

            </div>

            <button type="button"
                class="btn btn-cyber px-4 py-2"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah">

                <i class="bi bi-plus-circle me-2"></i>
                Tambah Produk

            </button>

        </div>

        <!-- Alert -->
        <?php if (session()->getFlashdata('pesan')) : ?>

        <div class="alert alert-cyber alert-dismissible fade show mb-4"
            role="alert">

            <?= session()->getFlashdata('pesan'); ?>

            <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="alert">
            </button>

        </div>

        <?php endif; ?>

        <!-- Table -->
        <div class="table-card p-3">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 1;
foreach ($produk as $p) : ?>

                        <tr>

                            <td><?= $i++; ?></td>

                            <td>
                                <strong>
                                    <?= $p['nama_produk']; ?>
                                </strong>
                            </td>

                            <td>
                                <?= $p['nama_kategori']; ?>
                            </td>

                            <td>
                                Rp <?= number_format($p['harga'], 0, ',', '.'); ?>
                            </td>

                            <td>

                                <span class="badge bg-info text-dark px-3 py-2">
                                    <?= $p['stok']; ?>
                                </span>

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="/produk/edit/<?= $p['id_produk']; ?>"
                                        class="btn btn-edit btn-sm">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <form action="/produk/delete/<?= $p['id_produk']; ?>"
                                        method="post"
                                        class="d-inline">

                                        <input type="hidden"
                                            name="_method"
                                            value="DELETE">

                                        <button type="submit"
                                            class="btn btn-delete btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?');">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Modal -->
    <?= $this->include('produk/create'); ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>