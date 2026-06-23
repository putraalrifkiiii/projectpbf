<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?? 'Sistem Autentikasi' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
    /* Base styling agar senada dengan tema Dark/Glassmorphism yang baru dibuat */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #0f172a;
        /* Warna cadangan jika background view lambat load */
        color: #e2e8f0;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    </style>

    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

    <main role="main">
        <?= $this->renderSection('main') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>