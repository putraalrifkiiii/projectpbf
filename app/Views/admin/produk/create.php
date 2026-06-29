<?php
/**
 * @var string $title
 * @var array $kategori
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #050816;
    }

    /* Background Glow */
    body::before {
        content: '';
        position: fixed;
        width: 400px;
        height: 400px;
        background: rgba(0, 255, 255, 0.08);
        border-radius: 50%;
        top: -150px;
        left: -100px;
        filter: blur(100px);
        z-index: -1;
    }

    body::after {
        content: '';
        position: fixed;
        width: 350px;
        height: 350px;
        background: rgba(255, 0, 255, 0.08);
        border-radius: 50%;
        bottom: -120px;
        right: -80px;
        filter: blur(100px);
        z-index: -1;
    }

    /* Modal Cyberpunk */
    .modal-content {
        background: linear-gradient(135deg,
                rgba(5, 8, 22, 0.98),
                rgba(10, 15, 35, 0.98));

        border: 1px solid rgba(0, 255, 255, 0.25);
        border-radius: 25px;
        overflow: hidden;

        box-shadow:
            0 0 20px rgba(0, 255, 255, 0.15),
            0 0 40px rgba(255, 0, 255, 0.08);

        color: white;

        position: relative;
    }

    /* Neon Line */
    .modal-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;

        background: linear-gradient(90deg,
                #00ffff,
                #ff00ff,
                #00ffff);
    }

    .modal-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 20px 25px;
    }

    .modal-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ffff;

        text-shadow:
            0 0 10px #00ffff,
            0 0 20px #00ffff;
    }

    .modal-body {
        padding: 25px;
    }

    .modal-footer {
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        padding: 20px 25px;
    }

    /* Label */
    .form-label {
        color: #00ffff;
        font-weight: 500;
        margin-bottom: 10px;
    }

    /* Input */
    .form-control,
    .form-select {
        background: rgba(255, 255, 255, 0.04) !important;
        border: 1px solid rgba(0, 255, 255, 0.2);
        color: white !important;
        border-radius: 14px;
        padding: 12px 15px;

        transition: 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #00ffff;

        box-shadow:
            0 0 10px rgba(0, 255, 255, 0.3);

        background: rgba(255, 255, 255, 0.06);
        color: white;
    }

    /* OPTION SELECT */
    .form-select option {
        background: #050816;
        color: #ffffff;
        padding: 10px;
    }

    /* Placeholder */
    ::placeholder {
        color: #94a3b8 !important;
    }

    /* Tombol */
    .btn-cyber {
        background: transparent;
        border: 1px solid #00ffff;
        color: #00ffff;
        border-radius: 12px;
        padding: 10px 18px;
        transition: 0.3s;
        font-weight: 500;
    }

    .btn-cyber:hover {
        background: #00ffff;
        color: black;

        box-shadow:
            0 0 15px #00ffff;
    }

    .btn-cancel {
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: #cbd5e1;
        border-radius: 12px;
        padding: 10px 18px;
    }

    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.12);
        color: white;
    }

    /* Cyber Text */
    .cyber-text {
        color: #94a3b8;
        font-size: 0.9rem;
    }

    .glow-icon {
        color: #ff00ff;

        text-shadow:
            0 0 10px #ff00ff,
            0 0 25px #ff00ff;
    }

    .btn-close {
        filter: invert(1);
    }

    /* Category Badge Preview */
    .category-preview {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .cyber-badge {
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 0.8rem;
        border: 1px solid rgba(0, 255, 255, 0.3);
        background: rgba(0, 255, 255, 0.08);
        color: #00ffff;

        box-shadow:
            0 0 10px rgba(0, 255, 255, 0.15);
    }

    .cyber-badge.pink {
        border-color: rgba(255, 0, 255, 0.3);
        background: rgba(255, 0, 255, 0.08);
        color: #ff00ff;

        box-shadow:
            0 0 10px rgba(255, 0, 255, 0.15);
    }

    .cyber-badge.yellow {
        border-color: rgba(255, 215, 0, 0.3);
        background: rgba(255, 215, 0, 0.08);
        color: #ffd700;

        box-shadow:
            0 0 10px rgba(255, 215, 0, 0.15);
    }
    </style>

</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">

                    <div>

                        <h5 class="modal-title" id="modalTambahLabel">

                            <i class="bi bi-box-seam me-2 glow-icon"></i>
                            TAMBAH PRODUK

                        </h5>

                        <small class="cyber-text">
                            Input data produk.
                        </small>

                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>

                <!-- Form -->
                <form action="<?= base_url('admin/produk/store') ?>" method="post">

                    <div class="modal-body">

                        <!-- Nama Produk -->
                        <div class="mb-4">

                            <label class="form-label">
                                Nama Produk
                            </label>

                            <input type="text" name="nama_produk" class="form-control"
                                placeholder="Masukkan nama produk..." required>

                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">

                            <label class="form-label">
                                Pilih Kategori
                            </label>

                            <select name="id_kategori" class="form-select" required>

                                <option value="" disabled selected>
                                    -- Pilih Kategori Produk --
                                </option>

                                <!-- PILIHAN MANUAL -->
                                <option value="1">
                                    📱 Smartphone
                                </option>

                                <option value="2">
                                    💻 Laptop
                                </option>

                                <option value="3">
                                    🎧 Aksesoris
                                </option>

                            </select>

                            <!-- Preview -->
                            <div class="category-preview">

                                <span class="cyber-badge">
                                    📱 Smartphone
                                </span>

                                <span class="cyber-badge pink">
                                    💻 Laptop
                                </span>

                                <span class="cyber-badge yellow">
                                    🎧 Aksesoris
                                </span>

                            </div>

                        </div>

                        <!-- Harga -->
                        <div class="mb-4">

                            <label class="form-label">
                                Harga Produk
                            </label>

                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 5000000"
                                required>

                        </div>

                        <!-- Stok -->
                        <div class="mb-2">

                            <label class="form-label">
                                Jumlah Stok
                            </label>

                            <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok..."
                                required>

                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">

                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">

                            Batal

                        </button>

                        <button type="submit" class="btn btn-cyber">

                            <i class="bi bi-save2 me-2"></i>
                            Simpan Produk

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>