<?php
$midtransConfig = new \Config\Midtrans();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="<?= esc($midtransConfig->clientKey) ?>">
    </script>
</head>

<body>

    <script>
    window.onload = function() {

        snap.pay('<?= esc($snap_token) ?>', {

            onSuccess: function(result) {

                console.log(result);

                alert("Pembayaran berhasil!");

                window.location.href = "<?= base_url('cart/success/' . $transaksi_id) ?>";

            },

            onPending: function(result) {

                console.log(result);

                alert("Pembayaran sedang menunggu pembayaran.");

                window.location.href = "<?= base_url('riwayat') ?>";

            },

            onError: function(result) {

                console.log(result);

                alert("Pembayaran gagal!");

                window.location.href = "<?= base_url('cart') ?>";

            },

            onClose: function() {

                alert("Anda menutup popup pembayaran sebelum menyelesaikan transaksi.");

                window.location.href = "<?= base_url('cart') ?>";

            }

        });

    };
    </script>

</body>

</html>