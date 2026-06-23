<?php
/**
 * @var array $transaksi
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Update Transaksi #<?= esc($transaksi['id']); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #050816;
        font-family: 'Poppins', sans-serif;
        color: white;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Glow Background */
    body::before {
        content: '';
        position: fixed;
        width: 500px;
        height: 500px;
        background: rgba(0, 255, 255, 0.08);
        top: -200px;
        left: -120px;
        border-radius: 50%;
        filter: blur(120px);
        z-index: -1;
    }

    body::after {
        content: '';
        position: fixed;
        width: 450px;
        height: 450px;
        background: rgba(255, 0, 255, 0.08);
        bottom: -180px;
        right: -120px;
        border-radius: 50%;
        filter: blur(120px);
        z-index: -1;
    }

    /* Cyber Card */
    .cyber-card {
        background:
            linear-gradient(135deg,
                rgba(0, 255, 255, 0.08),
                rgba(255, 0, 255, 0.05));

        border: 1px solid rgba(0, 255, 255, 0.18);
        border-radius: 28px;

        backdrop-filter: blur(18px);

        box-shadow:
            0 0 20px rgba(0, 255, 255, 0.08),
            0 0 50px rgba(255, 0, 255, 0.05);

        position: relative;
        overflow: hidden;
    }

    /* Neon Top Line */
    .cyber-card::before {
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

    /* Title */
    .cyber-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        color: #00ffff;

        text-shadow:
            0 0 10px #00ffff,
            0 0 20px #00ffff;
    }

    .cyber-title span {
        color: #ff00ff;

        text-shadow:
            0 0 10px #ff00ff,
            0 0 20px #ff00ff;
    }

    /* Subtitle */
    .cyber-subtitle {
        color: #94a3b8;
        margin-top: 10px;
    }

    /* Form */
    .form-label {
        color: #00ffff;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .form-control,
    .form-select {
        background: rgba(255, 255, 255, 0.04) !important;
        border: 1px solid rgba(0, 255, 255, 0.2);
        color: white !important;
        border-radius: 15px;
        padding: 14px 16px;

        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #00ffff;

        box-shadow:
            0 0 12px rgba(0, 255, 255, 0.3);

        background: rgba(255, 255, 255, 0.06) !important;
    }

    /* Efek khusus untuk field readonly agar kelihatan beda dikit */
    .form-control[readonly] {
        background: rgba(0, 0, 0, 0.2) !important;
        color: #94a3b8 !important;
        border-color: rgba(255, 255, 255, 0.1);
    }

    .form-select option {
        background: #050816;
        color: white;
    }

    ::placeholder {
        color: #94a3b8 !important;
    }

    /* Button */
    .btn-cyber {
        border: 1px solid #00ffff;
        color: #00ffff;
        background: transparent;

        border-radius: 14px;

        padding: 12px 22px;

        transition: 0.3s;
        font-weight: 500;
    }

    .btn-cyber:hover {
        background: #00ffff;
        color: black;

        box-shadow:
            0 0 18px #00ffff;
    }

    .btn-cancel {
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #cbd5e1;
        background: rgba(255, 255, 255, 0.05);

        border-radius: 14px;

        padding: 12px 22px;

        transition: 0.3s;
    }

    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }

    /* Back Button */
    .btn-back {
        position: absolute;
        top: 25px;
        right: 25px;

        border-radius: 12px;
    }

    /* Icon */
    .glow-icon {
        color: #ff00ff;

        text-shadow:
            0 0 10px #ff00ff,
            0 0 20px #ff00ff;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .cyber-card {
            padding: 30px 20px !important;
        }

        .cyber-title {
            font-size: 1.6rem;
        }
    }
    </style>

</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="cyber-card p-5">

                    <a href="<?= base_url('transaksi') ?>" class="btn btn-cancel btn-back">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali
                    </a>

                    <div class="text-center mb-5">

                        <h1 class="cyber-title">
                            <i class="bi bi-pencil-square glow-icon me-2"></i>
                            UPDATE
                            <span>TRANSAKSI</span>
                        </h1>

                        <p class="cyber-subtitle">
                            Ubah status pesanan #<?= esc($transaksi['id']); ?> pada sistem.
                        </p>

                    </div>

                    <form action="<?= base_url('admin/transaksi/update/' . $transaksi['id']) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label class="form-label">
                                Total Pembayaran
                            </label>
                            <input type="text" class="form-control"
                                value="Rp <?= number_format($transaksi['total'] ?? 0, 0, ',', '.') ?>" readonly>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">
                                Status Pesanan
                            </label>
                            <select name="status" class="form-select" required>
                                <option value="Pending" <?= ($transaksi['status'] == 'Pending') ? 'selected' : ''; ?>>
                                    Pending
                                </option>
                                <option value="Selesai" <?= ($transaksi['status'] == 'Selesai') ? 'selected' : ''; ?>>
                                    Selesai
                                </option>
                            </select>
                        </div>

                        <div class="d-flex gap-3 justify-content-center flex-wrap">

                            <button type="submit" class="btn btn-cyber">
                                <i class="bi bi-save2 me-2"></i>
                                Update Status
                            </button>

                            <a href="<?= base_url('transaksi') ?>" class="btn btn-cancel">
                                <i class="bi bi-x-circle me-2"></i>
                                Batal
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>